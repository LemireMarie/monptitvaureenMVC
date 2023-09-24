<?php
        function formValidator($array){

            $userPtrn = "/^[a-zA-ZÀ-ÿ]+$/";
            $passPtrn = "/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z])().{0,}$/";

            $formErrors = [];

            foreach ($array as $cle => $valeur) {

                if ($cle === "mail") {
                    if (!filter_var($valeur, FILTER_VALIDATE_EMAIL)) {
                        $formErrors[$cle] = TRUE;
                    }
                }

                if (strlen($valeur) < 8 && !preg_match($passPtrn, $valeur)) {
                    $formErrors[$cle] = TRUE;
                }
               
            }
        }
?>