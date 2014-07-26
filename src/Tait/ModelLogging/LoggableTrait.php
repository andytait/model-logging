<?php namespace Tait\ModelLogging;

use Tait\ModelLogging\ModelLog;
use Auth;

trait LoggableTrait
{
    /**
     * Get the logs for this object
     *
     * @return collection
     */
    public function getLogs()
    {
        return ModelLog::
            with('user')
            ->where('content_id', '=', $this->id)
            ->where('content_type', '=', class_basename($this))
            ->get();
    }

    /**
     * Save a new log
     *
     * @param  array $settings An array of settings to override the defaults
     *
     * @return void
     */
    public function saveLog(array $settings)
    {
        $log = new ModelLog;

        $log->fill(array_merge($this->getDefaults(), $settings));
        $log->save();
    }

    /**
     * Get some sensible defaults for this class
     *
     * @return array
     */
    protected function getDefaults()
    {
        return [
            'user_id' => Auth::id(),
            'content_id' => $this->id,
            'content_type' => class_basename($this),
            'action' => '',
            'description' => null,
        ];
    }
}
