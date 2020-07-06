<?php
if (!defined('ABSPATH')) {
    exit;
}

class WC_maxiPago_TEF_API extends WC_maxiPago_API
{

    private function validate_fields($formData)
    {
        try {
            if (!isset($formData['maxipago_tef_bank_code']) || '' === $formData['maxipago_tef_bank_code']) {
                throw new Exception(__('Please select a bank.', 'woocommerce-maxipago'));
            }
            if (!isset($formData['maxipago_tef_document']) || '' === $formData['maxipago_tef_document'] || !$this->check_document($formData['maxipago_tef_document'])) {
                throw new Exception(__('Please type the valid document number.', 'woocommerce-maxipago'));
            }
        } catch (Exception $e) {
            wc_add_notice('<strong>' . esc_html($this->gateway->title) . '</strong>: ' . esc_html($e->getMessage()), 'error');
            return false;
        }
        return true;
    }

    public function sale_order(WC_Order $order, $post)
    {
        $result = array(
            'result' => 'fail',
            'redirect' => ''
        );
        if ('yes' == $this->gateway->save_log && class_exists('WC_Logger')) {
            $this->log = new WC_Logger();
        }
        if ($this->validate_fields($post)) {

            $client = new maxiPago();
            $client->setCredentials($this->gateway->merchant_id, $this->gateway->merchant_key);
            $client->setEnvironment($this->gateway->environment);

            $customer_document = $post['maxipago_tef_document'];
            $tef_bank = $post['maxipago_tef_bank_code'];

            $charge_total = (float)$order->get_total();
            $shipping_total = (float)$order->get_shipping_total();

            $ipAddress = $this->clean_ip_address($order->get_customer_ip_address());

            $request_data = array(
                'referenceNum' => $this->gateway->invoice_prefix . $order->get_id(),
                'processorID' => $tef_bank,
                'ipAddress' => $ipAddress,
                'customerIdExt' => $customer_document,
                'chargeTotal' => wc_format_decimal($charge_total, wc_get_price_decimals()),
                'shippingTotal' => wc_format_decimal($shipping_total, wc_get_price_decimals()),
                'parametersURL' => '',
            );


            $addressData = $this->getAddressData($order, $customer_document);
            $orderData = $this->getOrderData($order);
            $request_data = array_merge($request_data, $addressData, $orderData);

            if ($this->log) $this->log->add('maxipago_api', '------------- onlineDebitSale -------------');
            $client->onlineDebitSale($request_data);

            if ($this->log) {
                $this->log->add('maxipago_api', $client->xmlRequest);
                $this->log->add('maxipago_api', $client->xmlResponse);
            }

            update_post_meta($order->get_id(), '_maxipago_request_data', $request_data);

            $result = $client->getResult();

            if (!empty($result)) {
                update_post_meta($order->get_id(), '_maxipago_result_data', $result);
                if ($client->isErrorResponse()) {
                    update_post_meta($order->get_id(), 'maxipago_transaction_id', $client->getTransactionID());
                    update_post_meta($order->get_id(), 'maxipago_error', $client->getMessage());
                    wc_add_notice('<strong>' . esc_html($this->gateway->title) . '</strong>: ' . wc_clean($client->getMessage()), 'error');
                } else {
                    if ($client->getTransactionID()) {
                        update_post_meta($order->get_id(), 'maxipago_transaction_id', $client->getTransactionID());
                        update_post_meta($order->get_id(), 'maxipago_response_message', $client->getMessage());
                        update_post_meta($order->get_id(), 'maxipago_processor_code', $client->getProcessorCode());

                        $this->updatePostMeta($order->get_id(), $result);
                    }
                    $updated = $this->set_order_status(
                        $client->getReferenceNum(),
                        $client->getResponseCode(),
                        $this->gateway->invoice_prefix
                    );
                    if ($updated) {
                        WC()->cart->empty_cart();
                        $result = array(
                            'result' => 'success',
                            'redirect' => $order->get_checkout_order_received_url()
                        );
                    }
                }
            } else {
                wc_add_notice('<strong>' . esc_html($this->gateway->title) . '</strong>: ' .
                    esc_html(__('An error has occurred while processing your payment, please try again.', 'woocommerce-maxipago')), 'error');
            }
        }
        return $result;
    }

}