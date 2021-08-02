<?php
header('Content-type:text/json');

$q = isset($_REQUEST["post_id"]) ? intval($_REQUEST["post_id"]) : '';
 
if(empty($q)) {
    echo 'pls select a post';
    exit;
}

jaime_api($q);

function jaime_api ($q) {

    global $wpdb;
    $response = array('status'=>'0','msg'=>'failed','data'=>'');
    $result = $wpdb->get_results("SELECT post_content FROM $wpdb->posts WHERE id = $q");
    $response['data'] = $result[0]->post_content;
    $response['status'] = '2';
    $response['msg'] = 'success';

    echo json_encode($response, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT);
}

?>
