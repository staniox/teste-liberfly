<?php

namespace App\Swagger;
use OpenApi\Annotations as OA;

/**
 * @OA\Info(
 *   version="1.0.0",
 *   title="Teste Liberfly"
 * )
 *
 * @OA\Post(
 *  tags={"Usuário"},
 *  summary="Cadastro de usuário",
 *  description="Este endpoint cadastra um novo usuário",
 *  path="/api/user",
 *  @OA\RequestBody(
 *      @OA\MediaType(
 *          mediaType="application/json",
 *          @OA\Schema(
 *              required={"name","email","code","password","password_confirmation"},
 *              @OA\Property(property="name", type="string", example="teste"),
 *              @OA\Property(property="email", type="string", example="teste@teste.com.br"),
 *              @OA\Property(property="password", type="string", example="teste123"),
 *              @OA\Property(property="password_confirmation", type="string", example="teste123"),
 *          )
 *      ),
 *  ),
 *  @OA\Response(
 *    response=200,
 *    description="OK",
 *    @OA\JsonContent(
 *       @OA\Property(property="message", type="string", example="usuário registrado com sucesso")
 *    )
 *  ),
 *  @OA\Response(
 *    response=422,
 *    description="Unprocessable Content",
 *    @OA\JsonContent(
 *       @OA\Property(property="message", type="string", example="O campo email já está sendo utilizado."),
 *       @OA\Property(property="errors", type="string", example="..."),
 *    )
 *  )
 * )
 * @OA\Post(
 *  tags={"Usuário"},
 *  summary="Login",
 *  description="Este endpoint realiza o login de um usuário cadastrado",
 *  path="/api/auth/login",
 *  @OA\RequestBody(
 *      @OA\MediaType(
 *          mediaType="application/json",
 *          @OA\Schema(
 *              required={"email","password"},
 *              @OA\Property(property="email", type="string", example="teste@teste.com.br"),
 *              @OA\Property(property="password", type="string", example="test")
 *          )
 *      ),
 *  ),
 *  @OA\Response(
 *    response=200,
 *    description="OK",
 *    @OA\JsonContent(
 *       @OA\Property(property="access_token", type="", example="eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0L2FwaS9hdXRoL2xvZ2luIiwiaWF0IjoxNjg3MTIzMzg2LCJleHAiOjE2ODcxMjY5ODYsIm5iZiI6MTY4NzEyMzM4NiwianRpIjoidGpvM2RVcTRBSnRReGMzSSIsInN1YiI6IjIiLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.yVpZkaqx3DbGvhvTvxnoAl8O_xtNxkoS7g-tF3LO-Do"),
 *       @OA\Property(property="token_type", type="", example="bearer"),
 *       @OA\Property(property="expires_in", type="", example="3600")
 *    )
 *  ),
 *  @OA\Response(
 *    response=401,
 *    description="Unauthorized",
 *    @OA\JsonContent(
 *       @OA\Property(property="error", type="string", example="usuário não autorizado"),
 *    )
 *  )
 * )
 *
 * @OA\Get(
 *  path="/api/users",
 *  tags={"Usuário autenticado"},
 *  summary="Retorna lista de usuários",
 *  security={{"jwt":{}}},
 *  description="Este endpoint retorna todos os usuários cadastrados no banco",
 *  @OA\Response(
 *    response=200,
 *    description="OK",
 *    @OA\JsonContent(
 *       @OA\Property(property="id", type="string", example="1"),
 *       @OA\Property(property="name", type="string", example="teste"),
 *       @OA\Property(property="email", type="string", example="teste@teste.com.br"),
 *       @OA\Property(property="email_verified_at", type="string", example="null"),
 *       @OA\Property(property="created_at", type="string", example="2023-06-18T20:47:10.000000Z"),
 *       @OA\Property(property="updated_at", type="string", example="2023-06-18T20:47:10.000000Z"),
 *    )
 *  ),
 *  @OA\Response(
 *    response=401,
 *    description="Unauthorized",
 *    @OA\JsonContent(
 *       @OA\Property(property="message", type="string", example="Unauthenticated"),
 *    )
 *  )
 * )
 * @OA\Get(
 *  path="/api/user/{userId}",
 *  tags={"Usuário autenticado"},
 *  summary="Retorna usuário pelo id",
 *  security={{"jwt":{}}},
 *  description="Este endpoint retorna o usuário pelo id informado",
 * @OA\Parameter(
 *   name="userId",
 *   description="ID do usuario",
 *   @OA\Schema(
 *     type="integer"
 *   ),
 *   in="path",
 *   required=true
 * ),
 *  @OA\Response(
 *    response=200,
 *    description="OK",
 *    @OA\JsonContent(
 *       @OA\Property(property="id", type="string", example="1"),
 *       @OA\Property(property="name", type="string", example="teste"),
 *       @OA\Property(property="email", type="string", example="teste@teste.com.br"),
 *       @OA\Property(property="email_verified_at", type="string", example="null"),
 *       @OA\Property(property="created_at", type="string", example="2023-06-18T20:47:10.000000Z"),
 *       @OA\Property(property="updated_at", type="string", example="2023-06-18T20:47:10.000000Z"),
 *    )
 *  ),
 *  @OA\Response(
 *    response=401,
 *    description="Unauthorized",
 *    @OA\JsonContent(
 *       @OA\Property(property="message", type="string", example="Unauthenticated"),
 *    )
 *  )
 * )
 *
 * @OA\Post(
 *  path="/api/auth/logout",
 *  tags={"Usuário autenticado"},
 *  summary="Logout",
 *  security={{"jwt":{}}},
 *  @OA\Response(
 *    response=200,
 *    description="OK",
 *    @OA\JsonContent(
 *       @OA\Property(property="message", type="string", example="usuário registrado com sucesso")
 *    )
 *  ),
 *  @OA\Response(
 *    response=401,
 *    description="Unauthorized",
 *    @OA\JsonContent(
 *       @OA\Property(property="message", type="string", example="Unauthenticated"),
 *    )
 *  )
 * )
 * @OA\Delete(
 *  path="/api/user/{userId}",
 *  tags={"Usuário autenticado"},
 *  summary="Destroy",
 *  security={{"jwt":{}}},
 * @OA\Parameter(
 *   name="userId",
 *   description="Id do usuario",
 *   @OA\Schema(
 *     type="integer"
 *   ),
 *   in="path",
 *   required=true
 * ),
 *  @OA\Response(
 *    response=200,
 *    description="OK",
 *    @OA\JsonContent(
 *       @OA\Property(property="message", type="string", example="usuário excluido com sucesso")
 *    )
 *  ),
 *  @OA\Response(
 *    response=401,
 *    description="Unauthorized",
 *    @OA\JsonContent(
 *       @OA\Property(property="message", type="string", example="Unauthenticated"),
 *    )
 *  )
 * )
 */
class User
{

}
