<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Support Ticket</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .chat-container {
            max-width: 400px;
            margin: 20px auto;
            border: 1px solid #ccc;
            border-radius: 10px;
            overflow: hidden;
        }

        .chat-header {
            background-color: #3490dc;
            color: white;
            padding: 10px;
            text-align: center;
        }

        .chat-body {
            padding: 15px;
            background-color: #f2f2f2;
            min-height: 300px;
        }

        .chat-message {
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
        }

        .received {
            background-color: #e6e6e6;
        }

        .form-group {
            margin-bottom: 10px;
        }

        input, textarea {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        button {
            background-color: #3490dc;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        /* Add more styling as needed */
    </style>
</head>
<body>

<div class="chat-container">
    <div class="chat-header">Customer Support</div>
    <div class="chat-body">
        <!-- Chat messages -->
        <div class="chat-message received">Hello! How can we assist you today?</div>

        <!-- Your existing form goes here -->
        <form method="post" action="{{ route('ticket.submit') }}" enctype="multipart/form-data">
            @csrf
            <!-- Form input fields -->
            <div class="form-group">
                <input type="text" name="name" placeholder="Your Name" required>
            </div>
            <div class="form-group">
                <input type="email" name="email" placeholder="Your Email" required>
            </div>
            <div class="form-group">
                <textarea name="problem_description" placeholder="Describe your problem" required></textarea>
            </div>
            <div class="form-group">
                <input type="file" name="attachment" accept=".pdf, .doc, .docx, .png, .jpg, .jpeg">
            </div>
            <div class="form-group">
                <button type="submit">Send</button>
            </div>
        </form>
    </div>
</div>

</body>
</html>
