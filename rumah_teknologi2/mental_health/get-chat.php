<?php 
// AMAN DAHH SAMA ACU
    session_start();
    if(isset($_SESSION['id'])){
        include_once "functions.php";
        $outgoing_id = $_SESSION['id'];
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $output = "";
        $sql = "SELECT * FROM messages LEFT JOIN user ON user.id = messages.outgoing_msg_id
                WHERE (outgoing_msg_id = {$outgoing_id} AND incoming_msg_id = {$incoming_id})
                OR (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id}) ORDER BY msg_id";
        $query = mysqli_query($conn, $sql);
        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_assoc($query)){
                if($row['outgoing_msg_id'] === $outgoing_id){
                    $output .=  '<div class="chat outgoing card-text my-3 bg-dark text-white p-3 shadow-sm" style="margin-left: 40%; border-radius:20px 20px 0 20px;">
                                    <div class="details" style="max-width: 100%">
                                        <p>' . $row['msg'] . '</p>
                                    </div>
                                </div>';    
                }
                else{
                    $output .= '<div class="chat incoming card-text my-3 bg-light text-dark p-3 shadow-sm" style="margin-right: 40%; border-radius:20px 20px 20px 0 ">
                                    <div class="details d-flex">
                                    
                                        <p>' . $row['msg'] . '</p>
                                    </div>
                                </div>';
                }
            }
        }else{
            $output .= '
            <div class="alert alert-primary d-flex justify-content-center mt-5 mx-5" >
            <i class="bi bi-info-circle-fill mx-5"></i>
                No messages are available. Once you send message they will appear here.
            </div>
            

            '; 
        }
        echo $output;
    }else{
        redirect('login.php');
    }
?>