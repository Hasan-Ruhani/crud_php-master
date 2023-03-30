<?php
    define('DB_NAME', 'data/db.txt');

    function seed(){
        $data = array(
            array(
                'id'    => '1',
                'fname' => 'Karim',
                'lname' => 'Huque',
                'roll'  => '11'
            ),array(
                'id'    => '2',
                'fname' => 'Rahim',
                'lname' => 'Huque',
                'roll'  => '12'
            ),array(
                'id'    => '3',
                'fname' => 'Kamal',
                'lname' => 'Huque',
                'roll'  => '13'
            ),array(
                'id'    => '4',
                'fname' => 'Salam',
                'lname' => 'Huque',
                'roll'  => '14'
            ),array(
                'id'    => '5',
                'fname' => 'Barkat',
                'lname' => 'Huque',
                'roll'  => '15'
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
            <?php
        }
        ?>
    </table>
<?php
    }