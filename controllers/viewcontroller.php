<?php
class ViewController {
    public function renderContent($opcion) {
        switch ($opcion) {
            case "inicio":
                return $this->inicio();
            case "ver":
                return $this->ver();
            case "ingresar":
                return $this->ingresar();
            case "modificar":
                return $this->modificar();
            case "eliminar":
                return $this->eliminar();
            default:
                return "<p>Error: Opción no válida.</p>";
        }
    }

    private function inicio() {
        return "<h2>Inicio</h2><p>Esta es la página de inicio.</p>";
    }

    private function ver() {
        return $this->includeView('/views/verdatos.php');
    }

    private function ingresar() {
        return $this->includeView('/views/ingresardatos.php');
    }

    private function modificar() {
        return $this->includeView('/views/modificardatos.php');
    }

    private function eliminar() {
        return $this->includeView('/views/eliminardatos.php');
    }

    private function includeView($relativePath) {
        $filePath = $_SERVER['DOCUMENT_ROOT'] . $relativePath;
        if (file_exists($filePath)) {
            ob_start();
            include $filePath;
            return ob_get_clean(); // Captura y devuelve la salida de la vista
        } else {
            return "<p>Error: No se encontró la vista requerida ($relativePath).</p>";
        }
    }
}
?>
