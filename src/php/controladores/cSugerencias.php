<?php

class CSugerencias {
    private $objSugerencias;
    public $vista;
    public $datos;

    public function __construct() {
        require_once RUTA_MODELOS . 'mSugerencias.php';
        $this->objSugerencias = new MSugerencias();
        $this->vista = '';
        $this->datos = [];
    }

    // Método para mostrar el formulario (carga los desplegables)
    public function index() {
        // Verificar si el usuario está logueado (Opcional, pero recomendable)
        if (!isset($_SESSION['usuario'])) {
            header('Location: index.php?c=Paginas&m=login');
            exit();
        }

        $this->datos['temas'] = $this->objSugerencias->temas();
        $this->datos['grupos'] = $this->objSugerencias->grupos();
        
        $this->vista = 'buzon';
        return $this->datos;
    }

    // Método para procesar el envío del formulario
    public function enviar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            // Validar que lleguen los datos
            if (empty($_POST['grupo']) || empty($_POST['tema']) || empty($_POST['mensaje'])) {
                echo "<script>alert('Por favor, rellena todos los campos.');</script>";
                return $this->index(); // Volver a cargar el formulario
            }

            // Intentar guardar
            $exito = $this->objSugerencias->insertarSugerencia($_POST);

            if ($exito) {
                echo "<script>
                        alert('¡Sugerencia enviada correctamente!');
                        window.location.href = 'index.php?c=Sugerencias&m=index';
                      </script>";
            } else {
                echo "<script>alert('Hubo un error al enviar la sugerencia.');</script>";
                return $this->index();
            }
        }
    }
}
?>