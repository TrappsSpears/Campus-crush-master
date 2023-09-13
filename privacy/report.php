
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <?php 
   
    include("stlyesr.php"); ?>
    <title>Report a Post</title>
</head>
<body>
    <header>
        <nav>
            <!-- Your navigation menu here -->
        </nav>
    </header>

    <div class="report-form">
        <h1>Report a Post</h1>
        <?php if(isset($_POST['report'])) {
    $post = $_POST['post'];
    $id_post = $_POST['post_id'];
    $user_id = $_POST['user_id']; ?>
        <form action="submit-report.php" method="post">
            <div class="post-box">
                <h3>The Post</h3>
                <p>
                    <?= $post ?>
                </p>
                
            </div>
            <section class="report-section">
                <h2>Who is this reporting for?</h2>
                <label>
                    <input type="radio" name="report_for" value="Myself"> Myself
                </label>
                <label>
                    <input type="radio" name="report_for" value="Community"> Community at Place
                </label>
                <label>
                    <input type="radio" name="report_for" value="Everyone"> Everyone on Witter
                </label>
            </section>
            
            <section class="report-section">
                <h2>What is happening?</h2>
                <select name="report_type">
                <option value="Bulling">Im being Bullied</option>
                    <option value="Spam">Spam</option>
                    <option value="Hate Speech">Hate Speech</option>
                    <option value="Harassment">Harassment</option>
                    <option value="Sensitive">Shown Sensitive or Disturbing content</option>
                    <option value="Other">Other (Please specify in the description)</option>
                </select>
                <textarea name="description" placeholder="Please describe the issue in detail..."></textarea>
            </section>
            
            <button type="submit">Submit Report</button>
        </form>
        <?php } else{?>
            <form action="submit-report.php" method="post">
            <h2>Any Issues ?</h2>
            <section class="report-section">
                <h2>Who is this reporting for?</h2>
                <label>
                    <input type="radio" name="report_for" value="Myself"> Myself
                </label>
                <label>
                    <input type="radio" name="report_for" value="Community"> Community at Place
                </label>
                <label>
                    <input type="radio" name="report_for" value="Everyone"> Everyone on Witter
                </label>
            </section>
            
            <section class="report-section">
                <h2>What is happening?</h2>
                <select name="report_type">
                <option value="Bulling">Im being Bullied</option>
                    <option value="Spam">Spam</option>
                    <option value="Hate Speech">Hate Speech</option>
                    <option value="Harassment">Harassment</option>
                    <option value="Sensitive">Shown Sensitive or Disturbing content</option>
                    <option value="Other">Other (Please specify in the description)</option>
                </select>
                <textarea name="description" placeholder="Please describe the issue in detail..."></textarea>
            </section>
            
            <button type="submit">Submit Report</button>
        </form>
        <?php } ?>
    </div>

    <footer>
        <p>&copy; 2023 <a href="../home/home.php"> Witter </a>. All rights reserved.</p>
    </footer>
</body>
</html>
