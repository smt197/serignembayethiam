<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'nom' => $this->nom,
            'prenom' => $this->prenom,
            'login' => $this->login,
            'photo' => $this->photo,
            'fonction' => $this->fonction,
            'role_id' => $this->role_id,
            'statut' => $this->statut,
            'role' => $this->when($this->role_id, function () {
                return new RoleResource($this->role);
            })
        ];
    }
}