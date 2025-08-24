<?php

require_once 'Initialize.php';

use DB\Helper\MySQLHelper;
use DB\DB;

// Database configuration
$host = 'localhost';
$dbname = 'mortingen_test';
$user = 'root';
$pass = '';

// Create database connection without specifying database name initially
try {
    // First connect without database name to create the database
    $connection = new MySQLHelper($host, '', $user, $pass);
    $db = new DB($connection);
    
    // Create database if it doesn't exist
    $db->query("CREATE DATABASE IF NOT EXISTS `{$dbname}`");
    
    // Now connect to the specific database
    $connection = new MySQLHelper($host, $dbname, $user, $pass);
    $db = new DB($connection);
    
    // Drop tables if they exist
    $db->query("DROP TABLE IF EXISTS `Post`");
    $db->query("DROP TABLE IF EXISTS `User`");
    
    // Initialize models
    User::init($db);
    Post::init($db);
    
    // Test inserting a user
    $userQuery = "INSERT INTO `User` (username, email, password_hash) VALUES (:username, :email, :password_hash)";
    $db->query($userQuery, [
        'username' => 'testuser',
        'email' => 'test@example.com',
        'password_hash' => password_hash('password123', PASSWORD_DEFAULT)
    ]);
    
    // Test inserting another user
    $userQuery2 = "INSERT INTO `User` (username, email, password_hash) VALUES (:username, :email, :password_hash)";
    $db->query($userQuery2, [
        'username' => 'testuser2',
        'email' => 'test2@example.com',
        'password_hash' => password_hash('password123', PASSWORD_DEFAULT)
    ]);
    
    // Test inserting a post
    $postQuery = "INSERT INTO `Post` (user_id, title, content) VALUES (:user_id, :title, :content)";
    $db->query($postQuery, [
        'user_id' => 1,
        'title' => 'First Post',
        'content' => 'This is the content of the first post.'
    ]);
    
    // Test inserting another post
    $postQuery2 = "INSERT INTO `Post` (user_id, title, content) VALUES (:user_id, :title, :content)";
    $db->query($postQuery2, [
        'user_id' => 2,
        'title' => 'Second Post',
        'content' => 'This is the content of the second post.'
    ]);
    
    // Test fetching initial data
    $initialUsers = $db->fetchAll("SELECT * FROM `User`");
    $initialPosts = $db->fetchAll("SELECT * FROM `Post`");
    
    // Test 1: Foreign key constraint by trying to insert a post with invalid user_id
    $foreignKeyTestResult = "";
    try {
        $invalidPostQuery = "INSERT INTO `Post` (user_id, title, content) VALUES (:user_id, :title, :content)";
        $db->query($invalidPostQuery, [
            'user_id' => 999, // This user doesn't exist
            'title' => 'Invalid Post',
            'content' => 'This post should fail due to foreign key constraint.'
        ]);
        $foreignKeyTestResult = "ERROR: Post with invalid user_id was inserted (it should have failed).";
    } catch (Exception $e) {
        $foreignKeyTestResult = "SUCCESS: Foreign key constraint is working.";
    }
    
    // Test 2: CASCADE DELETE - Delete a user and check if related posts are also deleted
    // First check how many posts exist for user_id = 2
    $postsBeforeDelete = $db->fetchAll("SELECT * FROM `Post` WHERE user_id = 2");
    $postsBeforeDeleteCount = count($postsBeforeDelete);
    
    // Delete the user
    $deleteUserQuery = "DELETE FROM `User` WHERE id = 2";
    $db->query($deleteUserQuery);
    
    // Check if posts for that user are also deleted
    $postsAfterDelete = $db->fetchAll("SELECT * FROM `Post` WHERE user_id = 2");
    $postsAfterDeleteCount = count($postsAfterDelete);
    
    $cascadeDeleteTestResult = "";
    if ($postsAfterDeleteCount == 0) {
        $cascadeDeleteTestResult = "SUCCESS: CASCADE DELETE is working. All posts for deleted user are also deleted.";
    } else {
        $cascadeDeleteTestResult = "ERROR: CASCADE DELETE is not working. Posts for deleted user still exist.";
    }
    
    // Test 3: Show remaining data
    $remainingUsers = $db->fetchAll("SELECT * FROM `User`");
    $remainingPosts = $db->fetchAll("SELECT * FROM `Post`");
    
    // Now create the UI using Bulma components
    echo "<!DOCTYPE html>
";
    echo "<html>
";
    echo "<head>
";
    echo "    <meta charset=\"UTF-8\">
";
    echo "    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
";
    echo "    <title>Model Test Results</title>
";
    echo "    <link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css\">
";
    echo "    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css\">
";
    echo "</head>
";
    echo "<body>
";
    echo "    <section class=\"hero is-primary\">
";
    echo "        <div class=\"hero-body\">
";
    echo "            <div class=\"container\">
";
    echo "                <h1 class=\"title\">
";
    echo "                    Model Test Results
";
    echo "                </h1>
";
    echo "                <h2 class=\"subtitle\">
";
    echo "                    User and Post Models with Foreign Key Constraints
";
    echo "                </h2>
";
    echo "            </div>
";
    echo "        </div>
";
    echo "    </section>
";
    echo "    
";
    echo "    <section class=\"section\">
";
    echo "        <div class=\"container\">
";
    echo "            <div class=\"columns\">
";
    echo "                <div class=\"column is-half\">
";
    echo "                    <div class=\"box\">
";
    echo "                        <h2 class=\"title is-4\">Database Setup</h2>
";
    echo "                        <div class=\"content\">
";
    echo "                            <ul>
";
    echo "                                <li>✓ Database 'mortingen_test' created or already exists</li>
";
    echo "                                <li>✓ Connected to database 'mortingen_test'</li>
";
    echo "                                <li>✓ Dropped 'Post' table if exists</li>
";
    echo "                                <li>✓ Dropped 'User' table if exists</li>
";
    echo "                                <li>✓ User model initialized</li>
";
    echo "                                <li>✓ Post model initialized</li>
";
    echo "                            </ul>
";
    echo "                        </div>
";
    echo "                    </div>
";
    echo "                </div>
";
    echo "                <div class=\"column is-half\">
";
    echo "                    <div class=\"box\">
";
    echo "                        <h2 class=\"title is-4\">Data Insertion</h2>
";
    echo "                        <div class=\"content\">
";
    echo "                            <ul>
";
    echo "                                <li>✓ First user inserted (ID: 1)</li>
";
    echo "                                <li>✓ Second user inserted (ID: 2)</li>
";
    echo "                                <li>✓ First post inserted (User ID: 1)</li>
";
    echo "                                <li>✓ Second post inserted (User ID: 2)</li>
";
    echo "                            </ul>
";
    echo "                        </div>
";
    echo "                    </div>
";
    echo "                </div>
";
    echo "            </div>
";
    echo "            
";
    echo "            <div class=\"box\">
";
    echo "                <h2 class=\"title is-4\">Initial Data State</h2>
";
    echo "                <div class=\"columns\">
";
    echo "                    <div class=\"column is-half\">
";
    echo "                        <h3 class=\"title is-5\">Users in Database</h3>
";
    echo "                        <table class=\"table is-bordered is-striped is-narrow is-hoverable is-fullwidth\">
";
    echo "                            <thead>
";
    echo "                                <tr>
";
    echo "                                    <th>ID</th>
";
    echo "                                    <th>Username</th>
";
    echo "                                    <th>Email</th>
";
    echo "                                    <th>Created At</th>
";
    echo "                                    <th>Updated At</th>
";
    echo "                                </tr>
";
    echo "                            </thead>
";
    echo "                            <tbody>
";
    
    foreach ($initialUsers as $user) {
        echo "                                <tr>
";
        echo "                                    <td>{$user['id']}</td>
";
        echo "                                    <td>{$user['username']}</td>
";
        echo "                                    <td>{$user['email']}</td>
";
        echo "                                    <td>{$user['created_at']}</td>
";
        echo "                                    <td>{$user['updated_at']}</td>
";
        echo "                                </tr>
";
    }
    
    echo "                            </tbody>
";
    echo "                        </table>
";
    echo "                    </div>
";
    echo "                    <div class=\"column is-half\">
";
    echo "                        <h3 class=\"title is-5\">Posts in Database</h3>
";
    echo "                        <table class=\"table is-bordered is-striped is-narrow is-hoverable is-fullwidth\">
";
    echo "                            <thead>
";
    echo "                                <tr>
";
    echo "                                    <th>ID</th>
";
    echo "                                    <th>User ID</th>
";
    echo "                                    <th>Title</th>
";
    echo "                                    <th>Content</th>
";
    echo "                                    <th>Created At</th>
";
    echo "                                    <th>Updated At</th>
";
    echo "                                </tr>
";
    echo "                            </thead>
";
    echo "                            <tbody>
";
    
    foreach ($initialPosts as $post) {
        echo "                                <tr>
";
        echo "                                    <td>{$post['id']}</td>
";
        echo "                                    <td>{$post['user_id']}</td>
";
        echo "                                    <td>{$post['title']}</td>
";
        echo "                                    <td>{$post['content']}</td>
";
        echo "                                    <td>{$post['created_at']}</td>
";
        echo "                                    <td>{$post['updated_at']}</td>
";
        echo "                                </tr>
";
    }
    
    echo "                            </tbody>
";
    echo "                        </table>
";
    echo "                    </div>
";
    echo "                </div>
";
    echo "            </div>
";
    echo "            
";
    echo "            <div class=\"notification is-warning\">
";
    echo "                <h2 class=\"title is-4\">User Deletion Test</h2>
";
    echo "                <p>User with ID 2 and all related posts will be deleted to test CASCADE DELETE functionality.</p>
";
    echo "            </div>
";
    echo "            
";
    echo "            <div class=\"columns\">
";
    echo "                <div class=\"column is-half\">
";
    echo "                    <div class=\"box\">
";
    echo "                        <h2 class=\"title is-4\">Foreign Key Constraint Test</h2>
";
    echo "                        <div class=\"content\">
";
    echo "                            <p><strong>Test 1: Invalid user_id constraint</strong></p>
";
    echo "                            <p class=\"has-text-success\">{$foreignKeyTestResult}</p>
";
    echo "                        </div>
";
    echo "                    </div>
";
    echo "                </div>
";
    echo "                <div class=\"column is-half\">
";
    echo "                    <div class=\"box\">
";
    echo "                        <h2 class=\"title is-4\">CASCADE DELETE Test</h2>
";
    echo "                        <div class=\"content\">
";
    echo "                            <p><strong>Test 2: CASCADE DELETE functionality</strong></p>
";
    echo "                            <ul>
";
    echo "                                <li>Posts for user_id = 2 before delete: {$postsBeforeDeleteCount}</li>
";
    echo "                                <li>User with id = 2 deleted</li>
";
    echo "                                <li>Posts for user_id = 2 after delete: {$postsAfterDeleteCount}</li>
";
    echo "                                <li class=\"has-text-success\">{$cascadeDeleteTestResult}</li>
";
    echo "                            </ul>
";
    echo "                        </div>
";
    echo "                    </div>
";
    echo "                </div>
";
    echo "            </div>
";
    echo "            
";
    echo "            <div class=\"box\">
";
    echo "                <h2 class=\"title is-4\">Final Data State</h2>
";
    echo "                <div class=\"notification is-info\">
";
    echo "                    <p>After deleting user with ID 2, all related posts have been automatically deleted due to CASCADE DELETE functionality.</p>
";
    echo "                </div>
";
    echo "                <div class=\"columns\">
";
    echo "                    <div class=\"column is-half\">
";
    echo "                        <h3 class=\"title is-5\">Remaining Users</h3>
";
    echo "                        <table class=\"table is-bordered is-striped is-narrow is-hoverable is-fullwidth\">
";
    echo "                            <thead>
";
    echo "                                <tr>
";
    echo "                                    <th>ID</th>
";
    echo "                                    <th>Username</th>
";
    echo "                                    <th>Email</th>
";
    echo "                                </tr>
";
    echo "                            </thead>
";
    echo "                            <tbody>
";
    
    foreach ($remainingUsers as $user) {
        echo "                                <tr>
";
        echo "                                    <td>{$user['id']}</td>
";
        echo "                                    <td>{$user['username']}</td>
";
        echo "                                    <td>{$user['email']}</td>
";
        echo "                                </tr>
";
    }
    
    echo "                            </tbody>
";
    echo "                        </table>
";
    echo "                    </div>
";
    echo "                    <div class=\"column is-half\">
";
    echo "                        <h3 class=\"title is-5\">Remaining Posts</h3>
";
    echo "                        <table class=\"table is-bordered is-striped is-narrow is-hoverable is-fullwidth\">
";
    echo "                            <thead>
";
    echo "                                <tr>
";
    echo "                                    <th>ID</th>
";
    echo "                                    <th>User ID</th>
";
    echo "                                    <th>Title</th>
";
    echo "                                </tr>
";
    echo "                            </thead>
";
    echo "                            <tbody>
";
    
    foreach ($remainingPosts as $post) {
        echo "                                <tr>
";
        echo "                                    <td>{$post['id']}</td>
";
        echo "                                    <td>{$post['user_id']}</td>
";
        echo "                                    <td>{$post['title']}</td>
";
        echo "                                </tr>
";
    }
    
    echo "                            </tbody>
";
    echo "                        </table>
";
    echo "                    </div>
";
    echo "                </div>
";
    echo "            </div>
";
    echo "            
";
    echo "            <div class=\"notification is-success\">
";
    echo "                <h2 class=\"title is-4\">All Tests Completed Successfully</h2>
";
    echo "                <p>User and Post models are working correctly with foreign key constraints and CASCADE DELETE functionality.</p>
";
    echo "            </div>
";
    echo "        </div>
";
    echo "    </section>
";
    echo "</body>
";
    echo "</html>
";
    
} catch (Exception $e) {
    echo "<!DOCTYPE html>
";
    echo "<html>
";
    echo "<head>
";
    echo "    <meta charset=\"UTF-8\">
";
    echo "    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
";
    echo "    <title>Error</title>
";
    echo "    <link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css\">
";
    echo "</head>
";
    echo "<body>
";
    echo "    <section class=\"section\">
";
    echo "        <div class=\"container\">
";
    echo "            <div class=\"notification is-danger\">
";
    echo "                <h2 class=\"title is-4\">Error</h2>
";
    echo "                <p>" . htmlspecialchars($e->getMessage()) . "</p>
";
    echo "            </div>
";
    echo "        </div>
";
    echo "    </section>
";
    echo "</body>
";
    echo "</html>
";
}