<?php
return function ($parameters) {
    $list = $parameters["list"];
    $iteration = $parameters["iteration"];
    $entry = 0;
    $element = null;

    $find_in_list = function ($list) use (&$iteration, &$entry, &$element) {
        $found = $iteration([
            "element" => $list[$entry],
            "entry" => $entry
        ]);

        if ($found) {
            $element = $list[$entry];
            $entry = count($list);

            return true;
        };
        if ($entry < count($list)) {
            $entry = $entry + 1;
    };  };
    for(; $entry < count($list); $find_in_list($list));

    return $element;
};
