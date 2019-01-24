<?php

	require_once 'Matrix.class.php';

	class Camera
    {
        static $verbose = false;
        private $position;
        private $translate_rotate_matrix;
        private $translate_matrix;
        private $project_matrix;
        private $rotate_matrix;
        private $width;
        private $height;

        static function doc() {
            return file_get_contents('Camera.doc.txt');
        }

        function __construct( array $tab ) {
            $this->position = $tab["origin"];
            $this->translate_matrix = new Matrix( array(
                "preset" => Matrix::TRANSLATION, "vtc" => (new Vector(array("dest" => $this->position)))->opposite() ));
            $this->rotate_matrix = $tab["orientation"];
            if ( isset($tab["ratio"]) ) {
                $ratio = $tab["ratio"];
                $this->width = 1920;
                $this->height = 1920 / $ratio;
            }
            else {
                $ratio = $tab["width"] / $tab["height"];
                $this->width = $tab["width"];
                $this->height = $tab["height"];
            }
            $fov = $tab["fov"];
            $near = $tab["near"];
            $far = $tab["far"];
            $this->translate_rotate_matrix = $this->rotate_matrix->mult( $this->translate_matrix );
            $this->project_matrix = new Matrix( array(
                "preset" => Matrix::PROJECTION, "fov" => $fov, "ratio" => $ratio, "far" => $far, "near" => $near) );
            if (self::$verbose) {
                echo 'Camera instance constructed' . PHP_EOL;
            }
        }

        function __destruct() {
            if (self::$verbose) {
                echo 'Camera instance destructed' . PHP_EOL;
            }
        }

        function __toString() {
            $tmp  = 'Camera(' . PHP_EOL;
            $tmp .= '+ Origine: ' . $this->position . PHP_EOL;
            $tmp .= '+ tT:' . PHP_EOL;
            $tmp .= $this->translate_matrix . PHP_EOL;
            $tmp .= '+ tR:' . PHP_EOL;
            $tmp .= $this->rotate_matrix . PHP_EOL;
            $tmp .= '+ tR->mult( tT ):' . PHP_EOL;
            $tmp .= $this->translate_rotate_matrix . PHP_EOL;
            $tmp .= '+ Proj:' . PHP_EOL;
            $tmp .= $this->project_matrix . PHP_EOL;
            $tmp .= ')';
            return ($tmp);
        }

        function watchVertex( Vertex $vertex ) {
            $vertex = $this->project_matrix->transformVertex( $this->translate_rotate_matrix->transformVertex($vertex) );
            $vertex->__set('x', ($vertex->__get('x') / ($this->width / 2)) - 1);
            $vertex->__set('y', ($vertex->__get('y') / ($this->height / 2)) - 1);
            return $vertex;
        }

        function watchTriangle( Triangle $triangle ) {
            $v1 = $this->watchVertex( $triangle->__get('v1') );
            $v2 = $this->watchVertex( $triangle->__get('v2') );
            $v3 = $this->watchVertex( $triangle->__get('v3') );
            return new Triangle( array('A' => $v1, 'B' => $v2, 'C' => $v3) );
        }

        function watchMesh( array $mesh ) {
            $new = array();
            foreach ($mesh as $triangle) {
                array_push($new, $this->watchTriangle($triangle));
            }
            return $new;
        }
    }