<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to PSIFY</title>
    <style>
        /* Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Full-screen Background */
        body, html {
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center; /* Center content horizontally */
            font-family: 'Arial', sans-serif;
            color: #ffffff;
            background: url('mentalh.jpg') no-repeat center center fixed;
            background-size: cover;
            overflow: hidden;
        }

        /* Overlay to darken the background */
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); /* Dark overlay for text readability */
            z-index: 0;
        }

        /* Centered Content with slight right offset */
        .content {
            position: relative;
            z-index: 1;
            text-align: center;
            margin-right: 5%; /* Slight right offset */
            white-space: nowrap; /* Ensures text stays on a single line */
        }

        .content h1 {
            font-size: 3em; /* Adjust size if needed */
            font-weight: bold;
            margin-bottom: 20px;
            letter-spacing: 2px;
        }

        /* Join Us Button */
        .join-btn {
            font-size: 1.2em;
            padding: 15px 40px;
            color: #fff;
            background-color: #007acc;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-decoration: none;
            margin-top: 10px;
            text-align: center;
            display: inline-block;
        }

        .join-btn:hover {
            background-color: #005b99;
            transform: scale(1.05);
        }
    </style>
</head>
<body>

    <!-- Background Overlay -->
    <div class="overlay"></div>

    <!-- Centered Greeting and Button with slight right alignment -->
    <div class="content">
        <centre><h2>WELCOME TO PSIFY</h2></centre>
        <a href="index.php" class="join-btn">JOIN US</a>
    </div>

</body>
</html>
