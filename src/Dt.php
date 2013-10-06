<?php

    namespace KsUtils;

    class Dt
    {
        static function rus2int($dt)
        {
            if (!$dt) {
                return null;
            }

            $date = \DateTime::createFromFormat('d.m.Y', $dt);

            if (!$date) {
                return null;
            }

            return $date->format('Y-m-d');
        }

        static function int2rus($dt)
        {
            if (!$dt) {
                return null;
            }

            $date = \DateTime::createFromFormat("Y-m-d", $dt);

            if (!$date) {
                return null;
            }

            return $date->format("d.m.Y");
        }
    }
