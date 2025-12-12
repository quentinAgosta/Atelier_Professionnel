using Microsoft.AspNetCore.Http;
using Microsoft.AspNetCore.Mvc;
using Microsoft.EntityFrameworkCore;
using System.Net;
using WebApplication1.Entities;

namespace WebApplication1.Controllers
{
    [ApiController]
    [Route("api/[controller]")]
    public class UserController : ControllerBase
    {
        private readonly DemoContext DBContext;

        public UserController(DemoContext DBContext)
        {
            this.DBContext = DBContext;
        }

        /// <summary>
        /// Definition du Web Service
        /// </summary>
        /// <remarks>Je manque d'imagination</remarks>
        /// <param name="id">id du client a retourné</param>   
        /// <response code="200">client selectionné</response>
        /// <response code="404">client introuvable pour l'id specifié</response>
        /// <response code="500">Oops! le service est indisponible pour le moment</response>
        
        [HttpGet("GetUsers")]
        public async Task<ActionResult<List<User>>> Get()
        {
            var List = await DBContext.Users.Select(
                s => new User
                {
                    Id = s.Id,
                    FirstName = s.FirstName,
                    LastName = s.LastName,
                    Username = s.Username,
                    Password = s.Password,
                    EnrollmentDate = s.EnrollmentDate
                }
            ).ToListAsync();

            if (List.Count < 0)
            {
                return NotFound();
            }
            else
            {
                return List;
            }
        }

        [HttpGet("GetUserById")]
        public async Task<ActionResult<User>> GetUserById(int Id)
        {
            User User = await DBContext.Users.Select(
                    s => new User
                    {
                        Id = s.Id,
                        FirstName = s.FirstName,
                        LastName = s.LastName,
                        Username = s.Username,
                        Password = s.Password,
                        EnrollmentDate = s.EnrollmentDate
                    })
                .FirstOrDefaultAsync(s => s.Id == Id);

            if (User == null)
            {
                return NotFound();
            }
            else
            {
                return User;
            }
        }

        [HttpPost("InsertUser")]
        public async Task<HttpStatusCode> InsertUser(User User)
        {
            var entity = new User()
            {
                Id = User.Id,
                FirstName = User.FirstName,
                LastName = User.LastName,
                Username = User.Username,
                Password = User.Password,
                EnrollmentDate = User.EnrollmentDate
            };

            DBContext.Users.Add(entity);
            await DBContext.SaveChangesAsync();

            return HttpStatusCode.Created;
        }

        [HttpPut("UpdateUser")]
        public async Task<HttpStatusCode> UpdateUser(User User)
        {
            var entity = await DBContext.Users.FirstOrDefaultAsync(s => s.Id == User.Id);

            entity.FirstName = User.FirstName;
            entity.LastName = User.LastName;
            entity.Username = User.Username;
            entity.Password = User.Password;
            entity.EnrollmentDate = User.EnrollmentDate;

            await DBContext.SaveChangesAsync();
            return HttpStatusCode.OK;
        }

        [HttpDelete("DeleteUser/{Id}")]
        public async Task<HttpStatusCode> DeleteUser(int Id)
        {
            var entity = new User()
            {
                Id = Id
            };
            DBContext.Users.Attach(entity);
            DBContext.Users.Remove(entity);
            await DBContext.SaveChangesAsync();
            return HttpStatusCode.OK;
        }
    }
}
