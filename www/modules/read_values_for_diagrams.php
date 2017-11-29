<?php 
    function get_defined_last_timestamp_from_array($array, $delta){
        // sort($array);
        $last_timestamp_in_array = end($array);
        Switch ($delta){
            case 'hour':
                return $last_timestamp_in_array - 3600;
            case 'day':
                return $last_timestamp_in_array - 86400;
            case 'week':
                return $last_timestamp_in_array - 604800;
            case 'month':
                return $last_timestamp_in_array - 2629700;
        }
    }
    
    $temperature_values = get_diagram_values($data_sensor_temperature_table);
    $humidity_values = get_diagram_values($data_sensor_humidity_table);
    $scale1_values = get_diagram_values($data_scale1_table);
    $scale2_values = get_diagram_values($data_scale2_table);
    
    $temperature_timestamps = array_keys($temperature_values);
    $humidity_timestamps = array_keys($humidity_values);
    $scale1_timestamps = array_keys($scale1_values);
    $scale2_timestamps = array_keys($scale2_values);
    
    $last_timestamp_temperature = $temperature_timestamps[count($temperature_timestamps)-1];
    $first_timestamp_temperature = get_defined_last_timestamp_from_array($temperature_timestamps, $diagram_mode);
    $last_timestamp_scale1 = $scale1_timestamps[count($scale1_timestamps)-1];
    $first_timestamp_scale1 = get_defined_last_timestamp_from_array($scale1_timestamps, $diagram_mode);
    
    foreach ($temperature_timestamps as $current_temperature_timestamp){
        if ($current_temperature_timestamp >= $first_timestamp_temperature){
            $temperature_timestamps_axis[] = $current_temperature_timestamp;
        }
    }
    foreach ($temperature_timestamps_axis as $current_temperature_timestamp_axis){
        $temperature_dataset[] = $temperature_values[$current_temperature_timestamp_axis];
    }
    
    foreach ($humidity_timestamps as $current_humidity_timestamp){
        if ($current_humidity_timestamp >= $first_timestamp_temperature){
            $humidity_timestamps_axis[] = $current_humidity_timestamp;
        }
    }
    foreach ($humidity_timestamps_axis as $current_humidity_timestamp_axis){
        $humidity_dataset[] = $humidity_values[$current_humidity_timestamp_axis];
    }
    // $timestamp_temperature_last_day = get_defined_last_timestamp_from_array($temperature_timestamps, 'day');
    // $timestamp_temperature_last_week = get_defined_last_timestamp_from_array($temperature_timestamps, 'week');
    // $timestamp_temperature_last_month = get_defined_last_timestamp_from_array($temperature_timestamps, 'month');
         // print '  timestamp_temperature_last_hour: ' . $timestamp_temperature_last_hour;
        // print '  timestamp_temperature_last_day: ' . $timestamp_temperature_last_day;
        // print '  timestamp_temperature_last_week: ' . $timestamp_temperature_last_week;
        // print '  timestamp_temperature_last_month: ' . $timestamp_temperature_last_month;
?>