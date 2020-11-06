<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Euro foreign exchange reference rates</title>
    <link rel="stylesheet" href="../../css/styles.css">
</head>
<body>
    <h1 align="center">Euro foreign exchange reference rates</h1>
    <div class="parent">
        <div class="left-sidebar"></div>
        <div class="body">
            <p>
                Euro foreign exchange reference rate are published on the
                <a href="https://www.ecb.europa.eu/stats/policy_and_exchange_rates/euro_reference_exchange_rates/
                html/index.en.html">European Central Bank's website</a> around
                5.00 p.m. (Latvia's local time) and republished on Latvijas Banka website. The rates are based
                on a regular daily concertation procedure between central banks of the European System of
                Central Banks and other central banks, which takes place every working day at 3.15 p.m.
                (Latvia's local time), and they reflect the foreign exchange market situation at the given moment.
            </p>
            <p>
                Euro foreign exchange reference rates are published according to the same calendar as used
                by the Trans-European Automated Real-time Gross settlement Express Transfer System (TARGET2),
                i.e. every day, except Saturdays and Sundays, and the following days: New Year's Day
                (1 January), Good Friday, Easter Monday, Labour Day (1 May), Christmas (25 and 26 December).
            </p>
            <form method="post" action="/update" style="text-align: center">
                <button type="submit">Update Currencies</button>
            </form>
            <table class="currencies-table">
                <thead>
                    <tr>
                        <th>Currency</th>
                        <th>Currency unit for 1 euro</th>
                    </tr>
                </thead>
                <?php foreach ($currencies as $currency): ?>
                <tbody>
                    <tr>
                        <td>
                            <?php echo $currency->getSymbol(); ?>
                        </td>
                        <td>
                            <?php echo $currency->getPrice(); ?>
                        </td>
                    </tr>
                </tbody>
                <?php endforeach; ?>
            </table>
        </div>
        <div class="right-sidebar"></div>
    </div>
</body>
</html>