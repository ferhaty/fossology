/*********************************************************************
Copyright (C) 2010 Hewlett-Packard Development Company, L.P.

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
*********************************************************************/

#include <stdio.h>
#include <sys/stat.h> 
#include "utility.h"

/* global variables. */
char *Filename = "";
char *NewDir = "./test-result";
int Recurse = -1;
int existed = 0; // default not existed
magic_t MagicCookie;

/**
 * @brief juge if the file or directory is existed not
 * @param path_name, the file or directory name including path
 * @return existed or not, 0: not existed, 1: existed
 */
int file_dir_existed(char *path_name)
{
  struct stat sts;
  int existed = 1; // 0: not existed, 1: existed, default existed
  if ((stat (path_name, &sts)) == -1)
  {
    //printf ("The file or dir %s doesn't exist...\n", path_name);
    existed = 0;
  }
  return existed;
}

#if 0
int main()
{
  int result = file_dir_existed("./test-data");
  printf("result is:%d\n", result);
  return 0; 
}
#endif
