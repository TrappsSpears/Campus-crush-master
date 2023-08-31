<style>
        .signup-form {
            padding: 10px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px; /* Limit the form width for readability */
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .input-container {
            display: flex;
            gap: 10px;
        }
        input{
            width: 100%;
        }
        .select_country{
            background-color: inherit;
            padding: 6px;
            border: 1px solid gray;
            color: white;
            width: 60%;
            height: 40px;
            position: relative;
            top: 10px;
            border-radius: 6px;
        }
        .signup-form select option {
            /* Style the individual options */
            background-color: white;
            color: #333;
            font-size: 14px;
        }

        .signup-form select option:hover {
            /* Style for hovered options */
            background-color: #f0f0f0;
        }

        /* Additional styling as needed */
        .signup-form button {
            width: 100%;
      
            border: none;
            background-color: #007bff;
            color: #fff;
            border-radius: 4px;
            cursor: pointer;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: rgb(44, 47, 60);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #fff;
              background: linear-gradient(to bottom, #3498db, #9b59b6);
            opacity: 0.8;
            background-repeat: no-repeat;
        }
        h1 span{color: #880281;}
        .signup-container {
            background-color: #121212;
            padding: 6px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: center;
        }

        .signup-form {
            display: none;
        }

        h1 {
            color: #1e90ff;
            margin-bottom: 10px;
        }

        input {
            width: 90%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            background-color: #1a1a1a;
            color: #fff;
        }

        button {
            background-color: #1e90ff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #007acc;
        }

        .toggle-button , .toggle-button-sign {
            color: #1e90ff;
            cursor: pointer;
            margin-top: 10px;
        }
        
    </style>