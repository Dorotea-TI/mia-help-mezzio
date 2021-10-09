# mia-help-mezzio


$app->route('/mia-help/fetch/{id}', [Mia\Help\Handler\FetchHandler::class], ['GET', 'OPTIONS', 'HEAD'], 'mia_help.fetch');
$app->route('/mia-help/list', [Mia\Help\Handler\ListHandler::class], ['POST', 'OPTIONS', 'HEAD'], 'mia_help.list');
//$app->route('/mia-help/remove/{id}', [\Mia\Auth\Handler\AuthHandler::class, Mia\Help\Handler\RemoveHandler::class], ['GET', 'DELETE', 'OPTIONS', 'HEAD'], 'mia_help.remove');
//$app->route('/mia-help/save', [\Mia\Auth\Handler\AuthHandler::class, Mia\Help\Handler\SaveHandler::class], ['POST', 'OPTIONS', 'HEAD'], 'mia_help.save');