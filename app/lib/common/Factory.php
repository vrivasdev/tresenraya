<?php
/**
 * Fábrica de clases.
 *
 * Permite de forma sencilla crear instancias de las clases registradas
 * en la fábrica. Si se desean agregar nuevas opciones de clases deben
 * agregarlas en el método que sea necesario. Por ejemplo, para agregar
 * a la fábrica un nuevo objeto DAO de "Factura", necesitamos agregar
 * el siguiente código en el método {@link getDAO}:<br>
 * <code>
 * switch ($vo_class) {
 *    case 'factura' : return new FacturaDAO($db->getConn()); break;
 * }
 * </code>
 * Actualmente se manejan 2 tipos de instancias a través de 2 métodos,
 * el primer tipo es de "acceso a base de datos" ({@link getDAO})
 * y el segundo es de "objetos de valor" ({@link getVO}).<br>
 * Al momento de crear la instancia, la fábrica debe automáticamente
 * enviarle a los constructores de dichas clases todos los recursos
 * necesarios para su correcto desempeño.
 */
class Factory {

    function __construct(){

        //

    }

    function __destruct(){

        //

    }

    /**
     * getDAO() Genera las instancias de los objetos de acceso a base
     * de datos.
     *
     * @param string $vo_class Nombre del objeto de valor (en minúsculas)
     * del cual deseamos instanciar el DAO
     *
     * @return new class
     *
     */

    function getDAO($vo_class){

        /**
         * $db es el contenedor del identificador de conexión a la base
         * de datos. El enlace es generado automáticamente en el constructor
         * de la clase {@link DB}
         *
         * @var database resource
         */

        $db = new DB();
        $conn = $db->obtenerCon();

        switch ($vo_class) {
            case 'game' : return new GameDAO($conn); break;

        }

    }

    /**
     * getVO() Genera las instancias de los objetos de valor
     *
     * @param string $vo_class Nombre del objeto de valor (en minúsculas)
     * del cual deseamos crear una nueva instancia
     *
     * @return new class
     *
     */

    function getVO($vo_class){

        switch ($vo_class) {

            case 'game' : return new Game(); break;

        }

    }

}

?>
