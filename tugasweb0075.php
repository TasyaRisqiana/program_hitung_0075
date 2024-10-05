<!DOCTYPE html> 
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perhitungan Diskon Belanja</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500&display=swap" rel="stylesheet">
    <style>
        /* Styling umum */
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #667eea, #764ba2);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #333;
        }

        /* Kotak utama */
        .container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            width: 100%;
            text-align: center;
            transition: transform 0.3s ease;
        }

        /* Hover efek untuk container */
        .container:hover {
            transform: translateY(-10px);
        }

        /* Gaya untuk heading */
        h1 {
            font-size: 26px;
            color: #4a5568;
            margin-bottom: 25px;
        }

        /* Gaya untuk label */
        label {
            font-size: 14px;
            color: #6b7280;
            display: block;
            margin-bottom: 8px;
            text-align: left;
        }

        /* Input number dan checkbox */
        input[type="number"] {
            margin-top: 10px;
            margin-bottom: 20px;
            padding: 12px;
            width: 100%;
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            font-size: 14px;
            transition: border-color 0.3s ease;
        }

        input[type="number"]:focus {
            border-color: #764ba2;
            outline: none;
        }

        input[type="checkbox"] {
            margin-right: 10px;
            transform: scale(1.2);
        }

        /* Gaya untuk tombol */
        button {
            padding: 12px 24px;
            background-color: #667eea;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 500;
            transition: background-color 0.3s ease;
            box-shadow: 0 4px 14px rgba(102, 126, 234, 0.5);
        }

        /* Hover efek pada tombol */
        button:hover {
            background-color: #5a67d8;
        }

        /* Gaya untuk hasil */
        h2 {
            margin-top: 30px;
            color: #2d3748;
            font-size: 22px;
        }

        #hasil {
            background-color: #edf2f7;
            padding: 20px;
            border-radius: 8px;
            margin-top: 15px;
            text-align: left;
            font-size: 16px;
            color: #4a5568;
            border: 1px solid #e2e8f0;
        }

        /* Media query untuk tampilan lebih kecil */
        @media (max-width: 500px) {
            .container {
                padding: 20px;
            }

            h1 {
                font-size: 20px;
            }

            button {
                padding: 10px 20px;
                font-size: 14px;
            }
        }
    </style>
    <script>
        function hitungDiskon() {
            var totalBelanja0075 = parseFloat(document.getElementById("totalBelanja").value);
            var member0075 = document.getElementById("member").checked;
            var diskon0075 = 0;
            var potonganMember0075 = 0;
            var sisaSetelahPotongan0075 = totalBelanja0075;

            // Jika member
            if (member0075) {
                potonganMember0075 = 10;  // Potongan 10% selalu ada untuk member
                var potonganMemberRupiah0075 = (potonganMember0075 / 100) * totalBelanja0075;
                sisaSetelahPotongan0075 = totalBelanja0075 - potonganMemberRupiah0075;

                if (sisaSetelahPotongan0075 > 1000000) {
                    diskon0075 = 15;  // Diskon 15% untuk sisa belanja di atas 1.000.000
                } else if (sisaSetelahPotongan0075 >= 500000) {
                    diskon0075 = 10;  // Diskon 10% untuk sisa belanja antara 500.000 dan 1.000.000
                }
            } 
            // Jika bukan member
            else {
                if (totalBelanja0075 > 1000000) {
                    diskon0075 = 10;  // Diskon 10% untuk belanja di atas 1.000.000
                } else if (totalBelanja0075 >= 500000) {
                    diskon0075 = 5;   // Diskon 5% untuk belanja antara 500.000 dan 1.000.000
                }
            }

            var potonganDiskon0075 = (diskon0075 / 100) * sisaSetelahPotongan0075;
            var totalBayar0075 = sisaSetelahPotongan0075 - potonganDiskon0075;

            document.getElementById("hasil").innerHTML = 
                "Potongan member: " + potonganMember0075 + "%<br>" +
                "Diskon tambahan: " + diskon0075 + "%<br>" + 
                "Total Potongan dan diskon: Rp" + potonganDiskon0075.toFixed(2) + "<br>" + 
                "Total yang harus dibayar: Rp" + totalBayar0075.toFixed(2);
        }
    </script>
</head>
<body>
    <div class="container">
        <h1>Hitung Diskon Belanja</h1>
        <label for="totalBelanja">Total Belanja (Rp):</label>
        <input type="number" id="totalBelanja" placeholder="Masukkan total belanja"><br>

        <label for="member"><input type="checkbox" id="member"> Apakah Anda member?</label><br>

        <button onclick="hitungDiskon()">Hitung Diskon</button>

        <h2>Hasil:</h2>
        <p id="hasil"></p>
    </div>
</body>
</html>
