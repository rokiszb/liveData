<?php

namespace App\Services;

class UniversalHelper
{
    public static function makeHTMLTable ($data): string
    {
        $html = '';
        $num = 0;

        foreach($data as $value) {
            $oddEven = ($num % 2 == 0) ? 'class="odd"' : 'class="even"';
            $html .= <<<HTML_ROW
            <tr>
                <td class="$oddEven" role="row" >{$value['id']}</td>
                <td class="$oddEven" role="row" >{$value['customer_has_outgoing_activity_si804']}</td>
                <td class="$oddEven" role="row" >{$value['customer_core_market']}</td>
                <td class="$oddEven" role="row" >{$value['customer_billing_minutes_called_to_nicaragua']}</td>
                <td class="$oddEven" role="row" >{$value['customer_billing_minutes_called_to_macau']}</td>
            </tr>
HTML_ROW;
        }

        return $html;
    }

    public static function filterArrayData (array $data): array
    {
        foreach($data as &$arrayToFilter) {
            $arrayToFilter = array_filter((array) $arrayToFilter, function($key, $value) {
                $required = [
                    'id',
                    'customer_billing_minutes_called_to_macau', 
                    'customer_has_outgoing_activity_si804', 
                    'cata_package_revenue_app_ev_gestores_moneylender', 
                    'customer_core_market', 
                    'customer_billing_minutes_called_to_nicaragua'
                ];
                return in_array($value, $required);
            }, ARRAY_FILTER_USE_BOTH);
        }

        return $data;
    }

    public static function requestData ($client, $page)
    {
        $data = $client->request('GET', "http://localhost:56665/api/data/{$page}");
        $data = (json_decode($data->getContent()))->data;

        return self::filterArrayData($data);
    }
}