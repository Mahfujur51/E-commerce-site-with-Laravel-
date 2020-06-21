<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Email Templet</title>
</head>
<body>
    <h2>Thank You for purchase ({{$paymentInfo->transactions[0]->item_list->items[0]->name}})</h2>

</body>
</html>
