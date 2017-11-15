<?php
/**
 * Created by PhpStorm.
 * User: pavel.sapozhnikov@gmail.com
 * Date: 11/14/2017
 * Time: 5:51 PM
 */

class DealerScience {
    private $subject;

    private $number_of_chars;

    private $temp_array = [];

    private $current_position = 0;

    public function __construct($test_subject, $number) {
        $this->subject = $test_subject;
        $this->number_of_chars = $number;
    }

    private function all_largest_values() {
        $map = [];

        foreach ($this->temp_array as $el) {
            $map[$el] = strlen($el);
        }

        $max_length = max($map);

        $map = array_filter($map, function($element) use ($max_length) {
            return $element == $max_length;
        });

        return array_keys($map);
    }

    /**
     * Returns largest substring based on N unique characters
     *
     * @return array|bool
     */
    public function largest_string() {
        $this->temp_array = [];
        $this->current_position = 0;

        $done = false;

        while (!$done) {
            $result = $this->search_helper($this->current_position);
            if ($result == false) {
                $done = true;
            }
            if (!in_array($result, $this->temp_array)) {
                $this->temp_array[] = $result;
            }
        }

        $all_largest_values = $this->all_largest_values();

        if (empty($all_largest_values)) {
            return false;
        }

        //there could be multiple largest values lets just return the first one
        return [
            'result'            => $all_largest_values[0],
            'starting_position' => strpos($this->subject, $all_largest_values[0])
        ];
    }

    private function search_helper($start_pos) {
        if ($start_pos === strlen($this->subject) - 1) {
            return false;
        }
        if ($start_pos >= strlen($this->subject)) {
            return false;
        }

        $temp = [];

        for ($i = $start_pos; $i < strlen($this->subject); $i++) {
            if (empty($temp)) {
                $temp[] = $this->subject[$i];
                $this->current_position = $this->current_position + 1;
            } else {
                if (count(array_unique($temp)) < $this->number_of_chars) {
                    $temp[] = $this->subject[$i];
                    $this->current_position = $this->current_position + 1;
                } elseif (count(array_unique($temp)) == $this->number_of_chars && in_array($this->subject[$i], $temp)) {
                    $temp[] = $this->subject[$i];
                    $this->current_position = $this->current_position + 1;
                } elseif (count(array_unique($temp)) == $this->number_of_chars && !in_array($this->subject[$i], $temp)) {
                    break;
                }
            }
        }

        $this->current_position = $this->current_position - 1;

        return implode('', $temp);
    }
}

$ds = new DealerScience('dgfddsssdsfdffdfdfadfhheedsfdfcdfdxffdh', 2);
print_r($ds->largest_string());
$ds = new DealerScience('DealerScience', 3);
print_r($ds->largest_string());