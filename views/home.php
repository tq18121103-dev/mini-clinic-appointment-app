<?php /** @var array $data */ ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Clinic Appointment App</title>

    <style>
        body {
            font-family: serif;
            margin: 40px;
        }

        h1 {
            margin-bottom: 10px;
        }

        .clinic-info {
            margin-bottom: 30px;
        }

        .appointments {
            margin-top: 20px;
        }

        .card {
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 16px;
            margin-bottom: 20px;
        }

        .card p {
            margin: 6px 0;
        }

        .status-open {
            color: green;
            font-weight: bold;
        }

        .status-full {
            color: red;
            font-weight: bold;
        }
    </style>
</head>

<body>

<h1>Clinic Appointment Registration App</h1>

<p>Clinic: <?= $clinic_name ?></p>
<br>

<h2>Appointments</h2>

<div class="appointments">
    <?php foreach ($appointments as $item): ?>
        <div class="card">

            <p><strong>Doctor:</strong> <?= $item['doctor'] ?></p>
            <p><strong>Date:</strong> <?= $item['date'] ?></p>
            <p><strong>Total Slots:</strong> <?= $item['slots_total'] ?></p>
            <p><strong>Slots:</strong> <?= $item['slots_available'] ?></p>

            <p>
                <strong>Status:</strong>
                <?php if ($item['slots_available'] > 0): ?>
                    <span class="status-open">Open</span>
                <?php else: ?>
                    <span class="status-full">Full</span>
                <?php endif; ?>
            </p>

        </div>
    <?php endforeach; ?>
</div>

</body>
</html>