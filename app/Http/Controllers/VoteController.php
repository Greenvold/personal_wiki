<?php

namespace App\Http\Controllers;

use App\Episode;
use App\Guide;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    //
    public function vote($entityId, $entityType, $type)
    {
        $entity = $this->getEntity($entityId, $entityType);
        return auth()->user()->toggleVote($entity, $type);
    }

    public function getEntity($entityId, $entityType)
    {
        if ($entityType == 'guide') {
            return Guide::find($entityId);
        } elseif ($entityType == 'video') {
            return Episode::find($entityId);
        } else {
            throw new ModelNotFoundException('Entity not found.');
        }
    }
}