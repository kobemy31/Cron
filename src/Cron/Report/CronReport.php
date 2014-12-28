<?php
/**
 * This file is part of the Cron package.
 *
 * (c) Dries De Peuter <dries@nousefreak.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Cron\Report;

use Cron\Job\JobInterface;

/**
 * CronReport is the class holding all JobReports.
 *
 * @author Dries De Peuter <dries@nousefreak.be>
 */
class CronReport implements ReportInterface
{
    /**
     * @var JobReport[]
     */
    protected $taskReports = array();

    /**
     * @return boolean|null
     */
    public function isSuccessful()
    {

    }

    /**
     * @param JobReport $report
     */
    public function addJobReport(JobReport $report)
    {
        $this->taskReports[] = $report;
    }

    /**
     * @return JobReport[]
     */
    public function getReports()
    {
        return $this->taskReports;
    }

    /**
     * @param JobInterface $job
     *
     * @return JobReport|null
     */
    public function getReport(JobInterface $job)
    {
        foreach ($this->taskReports as $report) {
            if ($report->getJob() == $job) {
                return $report;
            }
        }

        return null;
    }
}
