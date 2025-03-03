<!DOCTYPE html>
<html>
<head>
    <title>Upload Receipt</title>
</head>
<body>
    <form action="{{ route('receipts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="receipt_file">Generate Receipt Upon Approved:</label>
        <input type="file" name="receipt_file" id="receipt_file" required>
        <button type="submit">Submit</button>
    </form>

    <h1>Receipts</h1>
    <ul>
        @foreach ($receipts as $receipt)
        <li>
            <a href="{{ route('receipt.show', ['id' => $receipt->id]) }}">{{ $receipt->receipt_number }}</a>
        </li>
        @endforeach
    </ul>
</body>
</html>