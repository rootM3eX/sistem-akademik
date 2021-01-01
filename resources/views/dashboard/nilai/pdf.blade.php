<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Semester:</th>
                            </tr>
                            
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $dt->semester }}</td>
                            </tr>
                            <tr>
                                <th>Bahasa Indonesia</th>
                                <th>:</th>
                                <td>{{ $dt->b_indo }}</td>

                                <th>Bahasa Inggris</th>
                                <th>:</th>
                                <td>{{ $dt->b_inggris }}</td>

                                <th>PKN</th>
                                <th>:</th>
                                <td>{{ $dt->pkn }}</td>
                                
                                <th>Matematika</th>
                                <th>:</th>
                                <td>{{ $dt->mtk }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>