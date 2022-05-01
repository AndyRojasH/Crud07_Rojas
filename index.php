<?php
include_once 'crud.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Biblioteca</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <br>
    <br> 
    <div id="form">
        <form method="post">
            <table width="100%" border="1" cellpadding="15">
                <tr>
                    <td>
                        <input type="text" name="idcode" placeholder="Código" value="<?php
                                        if(isset($_GET['edit'])) echo $getROW['idcode']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="title" placeholder="Título del libro" value="<?php
                                        if(isset($_GET['edit'])) echo $getROW['title']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="author" placeholder="Autor" value="<?php
                                        if(isset($_GET['edit'])) echo $getROW['author']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="year" placeholder="año" value="<?php
                                        if(isset($_GET['edit'])) echo $getROW['year']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="speciality" placeholder="Especialidad" value="<?php
                                        if(isset($_GET['edit'])) echo $getROW['speciality']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="editorial" placeholder="Editorial" value="<?php
                                        if(isset($_GET['edit'])) echo $getROW['editorial']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="isbn" placeholder="ISBN" value="<?php
                                        if(isset($_GET['edit'])) echo $getROW['isbn']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="url" placeholder="URL" value="<?php
                                        if(isset($_GET['edit'])) echo $getROW['url']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php
                        if (isset($_GET['edit'])){
                            ?>
                            <button type="submit" name="update">Editar</button>
                            <?php
                        }else{
                            ?>
                            <button type="submit" name="save">Registrar</button>
                            <?php
                        }
                        ?>
                        
                    </td>
                </tr>
            </table>
        </form>
    </div>  
    <div>
    <br>
    <br>
        <table id="form2" width="85%" border="1" cellpadding="20" align="center">
            <?php
            $res = $MySQLiconn->query("SELECT * FROM biblioteca");
			while ($row=$res->fetch_array()) {
                ?>
                <tr>
                    <td><?php echo $row['idcode']; ?></td>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['author']; ?></td>
                    <td><?php echo $row['year']; ?></td>
                    <td><?php echo $row['speciality']; ?></td>
                    <td><?php echo $row['editorial']; ?></td>
                    <td><?php echo $row['isbn']; ?></td>
                    <td><a href=<?php echo strval($row['url'])?>>Leer Libro</a></td>
                    <td><a href="?edit=<?php echo $row['idcode'];
                    ?>" onclick="return confirm('Confirmar edición')">Editar</a></td>
                    <td><a href="?del=<?php echo $row['idcode'];
                    ?>" onclick="return confirm('Confirmar eliminación')">Eliminar</a></td>           
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
</body>
</html>