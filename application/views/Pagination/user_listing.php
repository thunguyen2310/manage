<!-- views/user_listing.php -->
<html>
    <head>
        <title>Paging Example-User Listing</title>
    </head>
     
    <body>
        <div class="container">
            <h1 id='form_head'>User Listing</h1>
 
            <?php if (isset($results)) { ?>
                <table border="1" cellpadding="0" cellspacing="0">
                    <tr>
                        <th>ID</th>
                        <th>NAME</th>
                    </tr>
                     
                    <?php foreach ($results as $data) { ?>
                        <tr>
                            <td><?php echo $data->Id_Cl ?></td>
                            <td><?php echo $data->Name_Class ?></td>
                        </tr>
                    <?php } ?>
                </table>
            <?php } else { ?>
                <div>No user(s) found.</div>
            <?php } ?>
 
            <?php if (isset($links)) { ?>
                <?php echo $links ?>
            <?php } ?>
        </div>
    </body>
</html>