<?php
    define('DB_NAME', 'data/db.txt');

    function seed(){
        $data = array(
            array(
                'fname' => 'Karim',
                'lanme' => 'Huque',
                'roll' => '11'
            ),array(
                'fname' => 'Rahim',
                'lanme' => 'Huque',
                'roll' => '12'
            ),array(
                'fname' => 'Kamal',
                'lanme' => 'Huque',
                'roll' => '13'
            ),array(
                'fname' => 'Salam',
                'lanme' => 'Huque',
                'roll' => '14'
            ),array(
                'fname' => 'Barkat',
                'lanme' => 'Huque',
                'roll' => '14'
            ),
        );

    $serializedData = serialize( $data );
    file_put_contents( DB_NAME, $serializedData, LOCK_EX );
    }

    function generateReport(){
        $serializedData = file_get_contents(DB_NAME);
        $students = unserialize($serializedData);
?>
    <table>
        <tr>
            <th>Name</th>
            <th>Roll</th>
            <th>Action</th>
        </tr>
        <?php
        foreach($students as $student){
            ?>
                <tr>
                    <td> <?php printf('%s %s', $student['fname'], $student['lname']); ?>  </td>
                    <td> <?php printf('%s', $student['roll']); ?>  </td>
                    <td> <?php printf('<a href="#">Edit</a> | <a href="#">Delet</a>'); ?>  </td>
                </tr>
            <?
        }
        ?>
    </table>
<?php
    }