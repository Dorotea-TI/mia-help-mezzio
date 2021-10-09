<?php

namespace Mia\Help\Handler;

/**
 * Description of SaveHandler
 * 
 * @OA\Post(
 *     path="/mia_help/save",
 *     summary="MiaHelp Save",
 *     tags={"MiaHelp"},
*      @OA\RequestBody(
 *         description="Object",
 *         required=true,
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(ref="#/components/schemas/MiaHelp")
 *         )
 *     ),
 *     @OA\Response(
 *          response=200,
 *          description="successful operation",
 *          @OA\JsonContent(ref="#/components/schemas/MiaHelp")
 *     ),
 *     security={
 *         {"bearerAuth": {}}
 *     },
 * )
 *
 * @author matiascamiletti
 */
class SaveHandler extends \Mia\Auth\Request\MiaAuthRequestHandler
{
    /**
     * 
     * @param \Psr\Http\Message\ServerRequestInterface $request
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function handle(\Psr\Http\Message\ServerRequestInterface $request): \Psr\Http\Message\ResponseInterface 
    {
        // Obtener item a procesar
        $item = $this->getForEdit($request);
        // Guardamos data
        $item->language_id = intval($this->getParam($request, 'language_id', ''));
        $item->category_id = intval($this->getParam($request, 'category_id', ''));
        $item->title = $this->getParam($request, 'title', '');
        $item->content = $this->getParam($request, 'content', '');
        $item->likes = intval($this->getParam($request, 'likes', ''));
        $item->dislikes = intval($this->getParam($request, 'dislikes', ''));
        $item->status = intval($this->getParam($request, 'status', ''));        
        
        try {
            $item->save();
        } catch (\Exception $exc) {
            return new \Mia\Core\Diactoros\MiaJsonErrorResponse(-2, $exc->getMessage());
        }

        // Devolvemos respuesta
        return new \Mia\Core\Diactoros\MiaJsonResponse($item->toArray());
    }
    
    /**
     * 
     * @param \Psr\Http\Message\ServerRequestInterface $request
     * @return \App\Model\MiaHelp
     */
    protected function getForEdit(\Psr\Http\Message\ServerRequestInterface $request)
    {
        // Obtenemos ID si fue enviado
        $itemId = $this->getParam($request, 'id', '');
        // Buscar si existe el item en la DB
        $item = \Mia\Help\Model\MiaHelp::find($itemId);
        // verificar si existe
        if($item === null){
            return new \Mia\Help\Model\MiaHelp();
        }
        // Devolvemos item para editar
        return $item;
    }
}