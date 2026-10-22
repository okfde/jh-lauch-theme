<?php
    /**
     * pick sepcified svg illustrationa and embed it
     *
     */

    function replace_svg_css_class_fill($contents, $oldclass, $newclass, $newcolor) {
        preg_match('/'. $oldclass .'{fill:#([[0-9a-fA-F]+);}/i', $contents, $prev_color);
        $contents = str_replace($oldclass, $newclass, $contents);
        $contents = str_replace('#'.$prev_color[1], $newcolor, $contents);
        return $contents;
    }

    function get_random_illustration() {
        $illustrations = array('wrestler', 'octopus', 'teddy', 'monster', 'elias', 'robot');
        $rand_key = array_rand($illustrations, 1);
        return $illustrations[$rand_key];
    }

    function get_svg_content($svgname) {
        $filename = get_template_directory() . "/images/illustrations/change-". $svgname .".svg";
        $handle = fopen($filename, "r");
        $contents = fread($handle, filesize($filename));
        fclose($handle);
        return $contents;
    }

    function get_svg($svgpath) {
        $filename = get_template_directory() . "". $svgpath;
        $handle = fopen($filename, "r");
        $contents = fread($handle, filesize($filename));
        fclose($handle);
        return $contents;
    }

    function render_svg($svgpath) {
        echo get_svg($svgpath);
    }
