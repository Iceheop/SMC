<?php
    //base de datos
    include_once('../db/db.php');

    if (isset($_POST['validation'])) {

        //variables del formulario
        $user = $_POST['matricula'];
        $password = $_POST['password'];

        $query = "SELECT * FROM usuarios WHERE user = ?";

        $stmt = mysqli_prepare($db, $query);
        mysqli_stmt_bind_param($stmt, "s", $user);
        mysqli_stmt_execute($stmt);
        $validation = mysqli_stmt_get_result($stmt);
        $print = mysqli_fetch_array($validation);

        if ($print !== null && isset($print)) {
            if ($password === $print['password']) {
                //page session start
                include_once('../other/session.php');

                //validacion de usuario
                if ($print['rol_id'] === 1) {

                    //return variables session
                    $_SESSION['perfil'] = [
                        $print['matricula']
                    ];

                    $retorno = [
                        'success' => 1,
                        'text' => '¡Usuario Correcto!',
                        'mensaje' => 'Hola! este usuario esta regitrado en el sistema',
                    ];
                    echo json_encode($retorno);
                    exit();

                }else {
                    $retorno = [
                        'success' => 0,
                        'text' => '¡Usuario incorrecto!',
                        'mensaje' => 'Hola! este usuario no tiene el rol adecuado'
                    ];
                    echo json_encode($retorno);
                    exit();
                }
            }else {
                $retorno = [
                    'success' => 0,
                    'text' => '¡Usuario incorrecto!',
                    'mensaje' => 'Hola! la contraseña es incorrecta'
                ];
                echo json_encode($retorno);
                exit();
            }
            
        }else {
            $retorno = [
                'success' => 0,
                'text' => '¡Usuario incorrecto!',
                'mensaje' => 'Hola! este usuario no se encuantra regitrado en el sistema'
            ];
            echo json_encode($retorno);
            exit();
        }

    } else {
        $retorno = [
            'success' => 0,
            'text' => '¡Usuario incorrecto!',
            'mensaje' => 'Hola! este usuario no se encuantra regitrado en el sistema'
        ];
        echo json_encode($retorno);
        exit();
    }
?>