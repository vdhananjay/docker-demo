<?php
try {
    // connect to database
    $conn = new PDO("mysql:host={$_ENV['DB_HOST']};dbname={$_ENV['DB_DATABASE']}", $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD']);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die($e->getMessage());
}

// check if we are adding an attendee
if (!empty($_POST)) {
    try {
        $stmt = $conn->prepare('INSERT INTO attendees (firstname, lastname) VALUES (:fname, :lname)');
        $stmt->bindParam(':fname', $fname);
        $stmt->bindParam(':lname', $lname);

        $fname = ucfirst(strtolower($_POST['firstname']));
        $lname = ucfirst(strtolower($_POST['lastname']));

        $stmt->execute();
    } catch(PDOException $e) {
        die($e->getMessage());
    }
    header('Location: /', true, 302);
    exit;
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Bootstrap Website</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1>Hello CPLUG</h1>
        <div class="row">
            <div class="col-sm-6">
                <p>Bacon ipsum dolor amet pork chop beef pig cupim pancetta bresaola, jowl ham hock pork hamburger turducken flank pork belly frankfurter short ribs. Kevin beef leberkas beef ribs jowl filet mignon frankfurter rump swine. Tri-tip chicken pig meatball shank. Porchetta andouille ribeye pancetta, brisket pork cupim boudin cow rump biltong pork loin bresaola.</p>
                <p>Tail swine rump ham kielbasa. Cow short ribs beef ribs doner bresaola meatball ball tip. Capicola tail cupim pork belly kielbasa t-bone short loin fatback biltong cow alcatra filet mignon tongue. Rump jerky brisket, ground round filet mignon meatloaf flank turkey biltong porchetta cow ball tip tenderloin venison. Shank salami pancetta picanha. Meatball porchetta sausage turkey, swine ham frankfurter andouille sirloin burgdoggen strip steak kielbasa kevin boudin.</p>
                <p>Pastrami turkey brisket pork loin ham hock kevin. Meatball frankfurter kevin turkey pork tenderloin. Chicken boudin leberkas chuck prosciutto spare ribs, jerky tri-tip biltong. Sirloin jowl ham hock tenderloin pork loin.</p>
            </div>
            <div class="col-sm-6">
                <p>Lorem ipsum dolor sit amet, ex discere appetere suscipiantur mel, cum et doctus deleniti prodesset. Noluisse erroribus accusamus eum eu, saepe persius ut mea. Eam nobis nostrud suavitate in, te eos cibo molestie. Possit melius vocibus at duo.</p>
                <p>Vis in feugiat petentium, nostro scaevola et mel, ei sed congue inciderint. Adhuc epicurei atomorum eum in, illud facer mediocrem id nam, in usu sonet vivendum consequat. Usu at modo omnium neglegentur, dico conclusionemque mea et, ea mei mundi labitur. Nec cu eius inimicus mediocritatem. Eum cu meis saepe splendide.</p>
                <p>Eum ei postea admodum denique, pri te quis ubique, et usu explicari appellantur. Natum liber id eos, eam regione volutpat similique eu, stet nusquam no ius. Mei ex timeam nonumes constituto, wisi omnium quo ut. Erat modus tamquam mel ex, tota illum ad nam. Nec ex ferri putant commune, has nusquam partiendo an. Falli dolore pro ne, admodum probatus an pro.</p>
            </div>
        </div>
        <div class="row">
            <h2>Attendees</h2>
            <div class="col-sm-12">
                <?php
                try {
                    // get all attendees
                    $stmt = $conn->query('SELECT * FROM attendees');
                    $attendees = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    if (count($attendees) > 0) {
                        echo '<ul>';
                        // output attendees
                        foreach ($attendees as $attendee) {
                            echo '<li>' . $attendee['firstname'] . ' ' . $attendee['lastname'] . '</li>';
                        }
                        echo '</ul>';
                    } else {
                        echo '<div class="alert alert-info">No Attendees</div>';
                    }
                } catch(PDOException $e) {
                    echo $e->getMessage();
                }
                ?>
            </div>
        </div>
        <div class="row">
            <form role="form" method="POST">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="fname">First Name</label>
                        <input type="text" name="firstname" class="form-control" id="fname" placeholder="First Name">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="lname">Last Name</label>
                        <input type="text" name="lastname" class="form-control" id="lname" placeholder="Last Name">
                    </div>
                </div>
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-default">Add</button>
                </div>
            </form>
        </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
