<?php
/*
  Copyright (C) 2014-2015, Siemens AG
  Author: Johannes Najjar

  This program is free software; you can redistribute it and/or
  modify it under the terms of the GNU General Public License
  version 2 as published by the Free Software Foundation.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License along
  with this program; if not, write to the Free Software Foundation, Inc.,
  51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 */

namespace Fossology\Lib\Data;

class LicenseMatchTest extends \PHPUnit\Framework\TestCase
{
  /** @var LicenseRef */
  private $licenseRef;
  /** @var AgentRef */
  private $agentRef;
  /** @var null|int  */
  private $percent;
  /** @var int */
  private $fileId;
  /** @var int */
  private $licenseFileId;
  /** @var int */
  private $id;
  /** @var string */
  private $shortName;
  /** @var string */
  private $fullName;
  /** @var int */
  private $agentId;
  /** @var string */
  private $agentName;
  /** @var string */
  private $agentRevision;
  /** @var LicenseMatch */
  private $licenseMatch;

  protected function setUp() : void
  {
    $this->id = 8;
    $this->shortName = "testSN";
    $this->fullName = "testFN";
    $this->licenseRef = new LicenseRef($this->id, $this->shortName, $this->fullName);

    $this->agentId = 12;
    $this->agentName = "Monk";
    $this->agentRevision = "AgentRev";
    $this->agentRef = new AgentRef($this->agentId, $this->agentName, $this->agentRevision);

    $this->percent = 40;
    $this->fileId = 18;
    $this->licenseFileId = 12;

    $this->licenseMatch = new LicenseMatch($this->fileId, $this->licenseRef, $this->agentRef, $this->licenseFileId, $this->percent);

    $this->assertCountBefore = \Hamcrest\MatcherAssert::getCount();
  }

  protected function tearDown() : void
  {
    $this->addToAssertionCount(\Hamcrest\MatcherAssert::getCount()-$this->assertCountBefore);
  }

  public function testGetFileId()
  {
    assertThat($this->licenseMatch->getFileId(), is($this->fileId));
  }

  public function testGetLicenseFileId()
  {
    assertThat($this->licenseMatch->getLicenseFileId(), is($this->licenseFileId));
  }

  public function testGetLicenseRef()
  {
    assertThat($this->licenseMatch->getLicenseRef(), is($this->licenseRef));
  }

  public function testGetAgentRef()
  {
    assertThat($this->licenseMatch->getAgentRef(), is($this->agentRef));
    assertThat($this->licenseMatch->getAgentRef(), is(new AgentRef($this->agentId, $this->agentName, $this->agentRevision)));
  }

  public function testGetPercent()
  {
    assertThat($this->licenseMatch->getPercentage(), is($this->percent));
  }

  public function testGetLicenseId()
  {
    assertThat($this->licenseMatch->getLicenseId(), equalTo($this->id));
  }
}
