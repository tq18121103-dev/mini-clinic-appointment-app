<?php /** @var array $data */ ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($data['title']) ?></title>
</head>
<body>

<h1>Clinic Appointment App</h1>

<p>Clinic: <?= $clinic_name ?></p>
<br>

<h2>Appointments</h2>

<?php foreach ($appointments as $appointment): ?>

    <p>Doctor: <?= $appointment['doctor'] ?></p>

    <p>Date: <?= $appointment['date'] ?></p>

    <p>Total Slots: <?= $appointment['slots_total'] ?></p>

    <p>Slots: <?= $appointment['slots_available'] ?></p>

    <p>
        Status:
        <?= $appointment['slots_available'] > 0 ? 'Open' : 'Full' ?>
    </p>

    <br><br>

<?php endforeach; ?>

</body>
</html>