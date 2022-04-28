<table border="1">
    <tr>
        <td>User id</td>
        <td>Fullname</td>
        <td>Email</td>
        <td>Phone</td>
        <td>Date of birth</td>
        <td>Position</td>
        <td>Avatar</td>
    </tr>

    <?php
    foreach ($data['users'] as $user) {
        echo '<tr>
            <td>' . $user->user_id . '</td>' .
            '<td>' . $user->fullname . '</td>' .
            '<td>' . $user->email . '</td>' .
            '<td>' . $user->phone . '</td>' .
            '<td>' . date('d-m-Y', strtotime($user->dob)) . '</td>' .
            '<td>' . $user->position . '</td>' .
            '<td>' . $user->avatar . '</td>
            </tr>';
    }
    ?>
</table>