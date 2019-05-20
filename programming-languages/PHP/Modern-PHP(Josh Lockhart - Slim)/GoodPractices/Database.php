<?php 
include('./DatabaseSettings.php');
$pdo = new PDO(
  sprintf(
    'mysql:host=%s;dbname=%s;port=%s;charset=%s',
    $settings['host'],
    $settings['name'],
    $settings['port'],
    $settings['charset']
    ),
    $settings['username'],
    $settings['password']
);

'SELECT id FROM users WHERE email = "john@example.com"';

$sql = sprintf(
  'SELECT id FROM users WHERE email = "%s"',
  filter_input(INPUT_GET, 'email')
);

$sql = 'SELECT id FROM users WHERE email = :email';
$statement = $pdo->prepare($sql);
$email = filter_input(INPUT_GET, 'email');
$statement->bindValue(':email', $email);


// Build and execute SQL query
$sql = 'SELECT id, email FROM users WHERE email = :email';
$statement = $pdo->prepare($sql);
$email = filter_input(INPUT_GET, 'email');
$statement->bindValue(':email', $email, PDO::PARAM_INT);
$statement->execute();
// Iterate results
while (($result = $statement->fetch(PDO::FETCH_ASSOC)) !== false) {
echo $result['email'];
}

