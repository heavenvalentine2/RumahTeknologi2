<?php
while ($row = mysqli_fetch_assoc($query)) {
    $sql2 = "SELECT * FROM messages 
                i
                WHERE (incoming_msg_id = {$row['id']}
                OR outgoing_msg_id = {$row['id']}) 
                AND (outgoing_msg_id = {$outgoing_id} 
                OR incoming_msg_id = {$outgoing_id})
                ORDER BY msg_id DESC LIMIT 1";
    $query2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_assoc($query2);

    // If return query row >1 then $row2 as msg
    (mysqli_num_rows($query2) > 0) ? $result = $row2['msg'] : $result = "No message available";

    // Shorten the msg to ... and show msg
    (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;

    // If we send msg turns to You: msg
    if (isset($row2['outgoing_msg_id'])) {
        ($outgoing_id == $row2['outgoing_msg_id']) ? $you = "You: " : $you = "";
    } else {
        $you = "";
    }
    $pathx = "photo/" . $row['photo'];


    // Change stats
    ($row['acc_status'] == "Offline" or $row['acc_status'] == "non-active") ? $offline = "text-secondary" : $offline = "text-success";

    ($outgoing_id == $row['id']) ? $hid_me = "hide" : $hid_me = ""; 
    // ADDING MORE USER to chat_list
    
    if (isset($_GET['id_report'])){
        $output .= '
        <a class="text-decoration-none text-black" href="view/sos/kirim_laporan.php?id=' . $row['id'] . '&id_report=' . $id_report.'">
        <div class="content d-flex align-items-center border-1 border-bottom py-3 px-3">
                <img src="' . $pathx . '" class="rounded-circle m-3 me-4" alt="" style="width:70px; height:70px;">
                    <div class="details mx-3">
                        <h4>' . $row['name'] . '</h4>
                        <p>' . $you . $msg . '</p>
                    </div>
                    <div class="status-dot ' . $offline . ' ms-auto me-3 text-secondary "><i class="bi bi-circle-fill"></i></div>
                </div>
            </div>
        </a>';
    } else {
        $output .= '
        <a class="text-decoration-none text-black" href="chat_page.php?id=' . $row['id'] . '">
        <div class="content d-flex align-items-center border-1 border-bottom py-3 px-3">
                <img src="' . $pathx . '" class="rounded-circle m-3 me-4" alt="" style="width:70px; height:70px;">
                    <div class="details mx-3">
                        <h4>' . $row['name'] . '</h4>
                        <p>' . $you . $msg . '</p>
                    </div>
                    <div class="status-dot ' . $offline . ' ms-auto me-3 text-secondary "><i class="bi bi-circle-fill"></i></div>
                </div>
            </div>
        </a>';
    }
}
?>