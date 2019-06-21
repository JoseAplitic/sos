<?php

define ('HMAC_SHA256', 'sha256');
define ('SECRET_KEY_CYBS', 'e7562f87ee354ea9a42942ed9b11bb1f9040bb4a59024dd19b52cdd672d74c6169647b0864a5442797bc222bf4b0a8a31f63d0c6fa0e4c6c98a70fa806a78bc98af6c00328e645d1bd35401b4aef77d972641560865b40e0a4f9e7d6a7fe7528fea5db56a52a40e6b3828e732ece8d9b5074210531ad474eb15f2b1578dddc9a');

function sign ($params) {
    return signData(buildDataToSign($params), SECRET_KEY_CYBS);
}

function signData($data, $secretKey) {
    return base64_encode(hash_hmac('sha256', $data, $secretKey, true));
}

function buildDataToSign($params) {
    $signedFieldNames = explode(",",$params["signed_field_names"]);
    foreach ($signedFieldNames as $field) {
        $dataToSign[] = $field . "=" . $params[$field];
    }
    return commaSeparate($dataToSign);
}

function commaSeparate ($dataToSign) {
    return implode(",",$dataToSign);
}

?>
