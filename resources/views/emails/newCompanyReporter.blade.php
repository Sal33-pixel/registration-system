<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{__('admin.report')}}</title>
</head>
<body>
    {{__('admin.newCompanyReporterMessage', ['companyName' => $companyName])}}
</body>
</html>
