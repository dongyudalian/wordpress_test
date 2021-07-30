<?php

global $wpdb;
$q = isset($_GET["q"]) ? intval($_GET["q"]) : '';
 
if(empty($q)) {
    echo 'pls select a post';
    exit;
}

$result = $wpdb->get_results("SELECT * FROM $wpdb->posts WHERE id = $q");
$table = "<table border='1'>
<tr>
<th>ID</th>
<th>content</th>
<th>title</th>
<th>image</th>
</tr>";
$table .= "<tr>";
$table .=  "<td class = 'sql_id'>" . $result[0]->ID . "</td>";
$table .=  "<td>" . $result[0]->post_content . "</td>";
$table .=  "<td>" . $result[0]->post_title . "</td>";
$table .=  "<td class = 'sql_id'>" . get_the_post_thumbnail($result[0]->ID) . "</td>";
$table .=  "</tr>";
$table .=  "</table>";

echo $table;

?>