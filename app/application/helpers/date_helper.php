<?php
if (!function_exists('validate_and_convert_date')) {
  function validate_and_convert_date($date)
  {
    // Try to create a DateTime object from the given date in DD/MM/YYYY format
    $formatted_date = DateTime::createFromFormat('d/m/Y', $date);

    // Check if the date was valid and matches the input format
    if ($formatted_date && $formatted_date->format('d/m/Y') === $date) {
      // Return the date in YYYY-MM-DD format
      return $formatted_date->format('Y-m-d');
    } else {
      // Return false if the date is invalid
      return false;
    }
  }
}
