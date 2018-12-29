<?php

require_once('initialize.php');

function is_post_request() {
  return $_SERVER['REQUEST_METHOD'] == 'POST';
}

function is_get_request() {
  return $_SERVER['REQUEST_METHOD'] == 'GET';
}

function is_blank($value) {
  return !isset($value) || trim($value) === '';
}
function redirect_to($location) {
  header("Location: " . $location);
  exit;
}
function set_login_cookie($user) {
  $cookie_id = "S3w9vMa2zUORF6ChlKitWNbnqSYQgPy9"; //name of the cookie to obsecure its importance
  $session_id = md5(uniqid($user->getUsername(), true)); //setting uniq id to each user by username
  setcookie($cookie_id, $session_id, time() + (86400 * 30), "/"); // 86400 = 1 day
  $user->update_session_id($session_id);
}
function eat_login_cookie() {
  $cookie_id = "S3w9vMa2zUORF6ChlKitWNbnqSYQgPy9";
  if(isset($_COOKIE[$cookie_id])) {
    $user = User::find_by_cookie($_COOKIE[$cookie_id]);
    if($user) {
      unset($_COOKIE[$cookie_id]);
      set_login_cookie($user);
      return $user;
    } else {
      return false;
    }
  } else {
    return false;
  }
}

function spit_login_cookie() {
  $cookie_id = "S3w9vMa2zUORF6ChlKitWNbnqSYQgPy9";
  if(isset($_COOKIE[$cookie_id])) {
    unset($_COOKIE[$cookie_id]);
    setcookie($cookie_id, null, -1, '/');  }
  }

  function require_header($page) {
    if(isset($_SESSION['user_id'])) {
      if($_SESSION['is_admin'] == 1) {
        require_once PRIVATE_PATH . '/includes/admin_header.php';
      } else if ($_SESSION['is_super'] == 1) {
        require_once PRIVATE_PATH . '/includes/super_header.php';
      } else {
        require_once PRIVATE_PATH . '/includes/client_header.php';
      }
    } else {
      require_once PRIVATE_PATH . '/includes/user_header.php';
    }
  }

  function deny_user_access() {
    if(!isset($_SESSION['user_id'])) {
      header("Location: " . PROJECT_PATH . '/index.php');
    }
  }

  function deny_client_access() {
    if(isset($_SESSION['user_id']) && $_SESSION['is_admin'] == 0 && $_SESSION['is_super'] == 0) {
      header("Location: " . PROJECT_PATH . '/index.php');
    }
  }

  function deny_admin_access() {
    if(isset($_SESSION['user_id']) && $_SESSION['is_admin'] == 1 && $_SESSION['is_super'] == 0) {
      header("Location: " . PROJECT_PATH . '/admin/index.php');
    }
  }


  // Core validation functions
  // These need to be called from another validation function which
  // handles error reporting.
  //
  // For example:
  //
  // $errors = [];
  // function validate_presence_on($required_fields) {
  //   global $errors;
  //   foreach($required_fields as $field) {
  //     if (!has_presence($_POST[$field])) {
  //       $errors[$field] = "'" . $field . "' can't be blank";
  //     }
  //   }
  // }

  // * validate value has presence
  // use trim() so empty spaces don't countfl
  // use === to avoid false positives
  // empty() would consider "0" to be empty
  function has_presence($value) {
    $trimmed_value = trim($value);
    return isset($trimmed_value) && $trimmed_value !== "";
  }

  // * validate value has string length
  // leading and trailing spaces will count
  // options: exact, max, min
  // has_length($first_name, ['exact' => 20])
  // has_length($first_name, ['min' => 5, 'max' => 100])
  function has_length($value, $options=[]) {
    if(isset($options['max']) && (strlen($value) > (int)$options['max'])) {
      return false;
    }
    if(isset($options['min']) && (strlen($value) < (int)$options['min'])) {
      return false;
    }
    if(isset($options['exact']) && (strlen($value) != (int)$options['exact'])) {
      return false;
    }
    return true;
  }

  // * validate value has a format matching a regular expression
  // Be sure to use anchor expressions to match start and end of string.
  // (Use \A and \Z, not ^ and $ which allow line returns.)
  //
  // Example:
  // has_format_matching('1234', '/\d{4}/') is true
  // has_format_matching('12345', '/\d{4}/') is also true
  // has_format_matching('12345', '/\A\d{4}\Z/') is false
  function has_format_matching($value, $regex='//') {
    return preg_match($regex, $value);
  }

  // * validate value is a number
  // submitted values are strings, so use is_numeric instead of is_int
  // options: max, min
  // has_number($items_to_order, ['min' => 1, 'max' => 5])
  function has_number($value, $options=[]) {
    if(!is_numeric($value)) {
      return false;
    }
    if(isset($options['max']) && ($value > (int)$options['max'])) {
      return false;
    }
    if(isset($options['min']) && ($value < (int)$options['min'])) {
      return false;
    }
    return true;
  }

  // * validate value is inclused in a set
  function has_inclusion_in($value, $set=[]) {
    return in_array($value, $set);
  }

  // * validate value is excluded from a set
  function has_exclusion_from($value, $set=[]) {
    return !in_array($value, $set);
  }

  // * validate uniqueness
  // A common validation, but not an easy one to write generically.
  // Requires going to the database to check if value is already present.
  // Implementation depends on your database set-up.
  // Instead, here is a mock-up of the concept.
  // Be sure to escape the user-provided value before sending it to the database.
  // Table and column will be provided by us and escaping them is optional.
  // Also consider whether you want to trim whitespace, or make the query
  // case-sentitive or not.
  //
  // function has_uniqueness($value, $table, $column) {
  //   $escaped_value = mysql_escape($value);
  //   sql = "SELECT COUNT(*) as count FROM {$table} WHERE {$column} = '{$escaped_value}';"
  //   if count > 0 then value is already present and not unique
  // }

  ?>
