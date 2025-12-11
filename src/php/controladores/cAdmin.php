<?php
class CAdmin {
    private $objAdmin;
    public $vista;
    public $datos;

    public function __construct() {
        require_once RUTA_MODELOS . 'Admin.php';
        $this->objAdmin = new MAdmin();
        $this->vista = '';
        $this->datos = [];
    }

    public function index() {
        // 1. Verificar seguridad: Solo entra si está logueado Y es Tipo 0
        if (!isset($_SESSION['usuario']) || !isset($_SESSION['tipo']) || $_SESSION['tipo'] != 0) {
            header('Location: index.php?c=Paginas&m=login');
            exit();
        }

        // 2. Obtener datos del modelo
        $listaSugerencias = $this->objAdmin->obtenerSugerencias();

        // 3. Preparar datos para la vista
        $this->datos['sugerencias'] = $listaSugerencias;
        $this->datos['numFilas'] = count($listaSugerencias);

        $this->vista = 'panelAdmin';
        return $this->datos;
    }
}
?>