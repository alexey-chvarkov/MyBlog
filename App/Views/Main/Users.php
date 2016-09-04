
<table width="100%" border="1">
    <tr><td>UserId</td><td>Login</td><td>Password</td><td>Age</td><td>About</td><td>DateReg</td></tr>

    <?php foreach (App\Application::$DB->Users as $user): ?> 
        
        <tr>
            <td><?php echo $user->UserId; ?></td>
            <td><?php echo $user->Login; ?></td>
            <td><?php echo $user->Password; ?></td>
            <td><?php echo $user->Age; ?></td>
            <td><?php echo $user->About; ?></td>
            <td><?php echo $user->DateReg; ?></td>
        </tr>
        
        <?php endforeach; ?>

</table>