<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" >
</head>
<body>
    <div class="container">
        <div>
            <span>Nama Lengkap : {{ $respondens->name }}</span>
        </div>
        <div>
            <span>Skor : {{ $respondens->score }}</span>
        </div>
        <div>
            <span>Kritik dan Saran : {{ $respondens->criticism_and_suggestions }}</span>
        </div>
        <div>
            <span>IP Responden : {{ $respondens->ip_address }}</span>
        </div>
        <table class="table mt-5">
            <thead class="thead-dark">
              <tr>
                <th scope="col">No</th>
                <th scope="col">Pertanyaan</th>
                <th scope="col">Jawaban</th>
                <th scope="col">Tanggal Menjawab</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($respondens->answers as $key => $answer)
              <tr>
                <td>{{ $answer->question->serial_number }}</td>
                <td>{{ $answer->question->question }}</td>
                <td>
                @if ($answer->answer==1)
                    Sangat tidak puas
                @elseif ($answer->answer==2)
                    Tidak puas
                @elseif ($answer->answer==3)
                    Netral
                @elseif ($answer->answer==4)
                    Puas
                @else
                    Sangat Puas
                @endif
                </td>
                <td>{{ date('d-m-Y H:i:s', strtotime($answer->answer_date)) }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>